<?php

namespace App\Http\Controllers;

use App\Models\Absens;
use App\Exports\AbsenExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class AbsensController extends Controller
{
    public function absen(Request $request)
    {
        $request->validate([
            'lat'  => 'required|numeric',
            'lon'  => 'required|numeric',
            'foto' => 'required|string',
            'type' => 'required|in:masuk,pulang',
        ]);

        $userId  = Auth::id();
        $tanggal = now()->toDateString();
        $waktu   = now();

        if ($this->diLuarRadius($request->lat, $request->lon)) {
            return response()->json(['message' => 'Anda berada di luar jangkauan absensi!'], 422);
        }

        $fotoPath = $this->simpanFoto($request->foto, $request->type);

        $absen = Absens::firstOrNew([
            'user_id' => $userId,
            'tanggal' => $tanggal,
        ]);

        if ($request->type === 'masuk') {
            if ($absen->jam_masuk) {
                return response()->json(['message' => 'Anda sudah absen masuk hari ini.'], 422);
            }

            $absen->jam_masuk   = $waktu->format('H:i:s');
            $absen->lat_masuk   = $request->lat;
            $absen->lon_masuk   = $request->lon;
            $absen->foto_masuk  = $fotoPath;
            $absen->terlambat   = $this->cekTerlambat($waktu);
            $absen->status      = 'hadir';
        }

        if ($request->type === 'pulang') {
            if ($absen->jam_pulang) {
                return response()->json(['message' => 'Anda sudah absen pulang hari ini.'], 422);
            }

            if (!$this->bisaAbsenPulang($waktu)) {
                return response()->json(['message' => 'Absen pulang hanya bisa dilakukan setelah jam kerja selesai.'], 422);
            }

            $absen->jam_pulang   = $waktu->format('H:i:s');
            $absen->lat_pulang   = $request->lat;
            $absen->lon_pulang   = $request->lon;
            $absen->foto_pulang  = $fotoPath;

            if (!$absen->jam_masuk) {
                $absen->status = 'alpa';
            }
        }

        $absen->save();

        return response()->json([
            'message' => "Absen {$request->type} berhasil.",
            'data'    => $absen
        ]);
    }

    private function diLuarRadius($lat, $lon): bool
    {
        $kantorLat = env('OFFICE_LAT');
        $kantorLon = env('OFFICE_LON');
        $maxJarak  = env('MAX_DISTANCE_KM', 1);

        return $this->hitungJarak($lat, $lon, $kantorLat, $kantorLon) > $maxJarak;
    }

    private function simpanFoto(string $base64Foto, string $tipe): string
    {
        $filename = "{$tipe}_" . uniqid() . '.png';
        $decoded  = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Foto));

        Storage::disk('public')->put("absensi/{$filename}", $decoded);

        return "storage/absensi/{$filename}";
    }

    private function hitungJarak($lat1, $lon1, $lat2, $lon2): float
    {
        $earthRadius = 6371;
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $lat1 = deg2rad($lat1);
        $lat2 = deg2rad($lat2);

        $a = sin($dLat / 2) * sin($dLat / 2) +
            sin($dLon / 2) * sin($dLon / 2) * cos($lat1) * cos($lat2);
        $c = 2 * asin(sqrt($a));

        return $earthRadius * $c;
    }

    private function cekTerlambat(Carbon $waktu): bool
    {
        $jamKerja     = Carbon::createFromTimeString(env('JAM_KERJA', '09:00'));
        $toleransiMenit = env('TOLERANSI_MENIT', 10);

        return $waktu->greaterThan($jamKerja->addMinutes($toleransiMenit));
    }

    private function bisaAbsenPulang(Carbon $waktu): bool
    {
        $jamPulang = Carbon::createFromTimeString(env('JAM_PULANG', '16:00'));
        return $waktu->greaterThanOrEqualTo($jamPulang);
    }

    public function export(Request $request)
    {
        $range  = $request->input('range', 'minggu');
        $userId = $request->input('user_id');

        return Excel::download(new AbsenExport($range, $userId), 'rekap-absen.xlsx');
    }
}
