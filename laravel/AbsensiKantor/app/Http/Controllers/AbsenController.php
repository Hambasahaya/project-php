<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Exports\AbsenExport;
use Maatwebsite\Excel\Facades\Excel;

class AbsenController extends Controller
{
    public function absen(Request $request)
    {
        $this->validateAbsenRequest($request);

        $userId = Auth::id();
        $tanggal = now()->toDateString();
        $waktu = now();

        if ($this->isOutOfRange($request->lat, $request->lon)) {
            return response()->json(['message' => 'Anda berada di luar jangkauan absensi!'], 422);
        }

        $fotoPath = $this->simpanFoto($request->foto, $request->type);

        $absen = Absen::firstOrNew([
            'user_id' => $userId,
            'tanggal' => $tanggal,
        ]);

        return $request->type === 'masuk'
            ? $this->handleAbsenMasuk($absen, $waktu, $request, $fotoPath)
            : $this->handleAbsenPulang($absen, $waktu, $request, $fotoPath);
    }

    public function export(Request $request)
    {
        $range = $request->input('range', 'minggu');
        $userId = $request->input('user_id');
        return Excel::download(new AbsenExport($range, $userId), 'rekap-absen.xlsx');
    }
    private function validateAbsenRequest(Request $request)
    {
        $request->validate([
            'lat'  => 'required|numeric',
            'lon'  => 'required|numeric',
            'foto' => 'required|string',
            'type' => 'required|in:masuk,pulang',
        ]);
    }

    private function simpanFoto(string $fotoBase64, string $type): string
    {
        $filename = "{$type}_" . uniqid() . '.png';
        $decodedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $fotoBase64));
        Storage::disk('public')->put("absensi/{$filename}", $decodedImage);
        return "storage/absensi/{$filename}";
    }

    private function handleAbsenMasuk(Absen $absen, Carbon $waktu, Request $request, string $fotoPath)
    {
        if ($absen->jam_masuk) {
            return response()->json(['message' => 'Anda sudah absen masuk hari ini.'], 422);
        }

        $jamKerja = Carbon::parse(env('ABSEN_JAM_KERJA', '09:00'));
        $toleransi = (int)env('ABSEN_TOLERANSI_MENIT', 10);

        if ($waktu->lt($jamKerja)) {
            return response()->json([
                'message' => 'Absen masuk hanya bisa dilakukan setelah jam kerja dimulai (' . $jamKerja->format('H:i') . ').'
            ], 422);
        }

        $isTerlambat = $waktu->gt($jamKerja->copy()->addMinutes($toleransi));

        $absen->fill([
            'jam_masuk'   => $waktu->format('H:i:s'),
            'lat_masuk'   => $request->lat,
            'lon_masuk'   => $request->lon,
            'foto_masuk'  => $fotoPath,
            'terlambat'   => $isTerlambat,
            'status'      => 'hadir',
        ]);

        $absen->save();

        return response()->json(['message' => 'Absen masuk berhasil.']);
    }


    private function handleAbsenPulang(Absen $absen, Carbon $waktu, Request $request, string $fotoPath)
    {
        if ($absen->jam_pulang) {
            return response()->json(['message' => 'Anda sudah absen pulang hari ini.'], 422);
        }

        $jamMinimal = Carbon::parse(env('ABSEN_JAM_PULANG', '16:00'));
        if ($waktu->lt($jamMinimal)) {
            return response()->json(['message' => 'Absen pulang hanya bisa dilakukan setelah jam 16:00.'], 422);
        }

        $absen->fill([
            'jam_pulang'   => $waktu->format('H:i:s'),
            'lat_pulang'   => $request->lat,
            'lon_pulang'   => $request->lon,
            'foto_pulang'  => $fotoPath,
        ]);

        if (!$absen->jam_masuk) {
            $absen->status = 'alpa';
        }

        $absen->save();
        return response()->json(['message' => 'Absen pulang berhasil']);
    }

    private function isOutOfRange($lat, $lon): bool
    {
        $kantorLat = env('ABSEN_LAT_KANTOR', -6.186596);
        $kantorLon = env('ABSEN_LON_KANTOR', 106.691781);
        $maxDistance = env('ABSEN_MAX_DISTANCE', 1);

        return $this->hitungJarak($lat, $lon, $kantorLat, $kantorLon) > $maxDistance;
    }

    private function hitungJarak($lat1, $lon1, $lat2, $lon2): float
    {
        $earthRadius = 6371;
        $latFrom = deg2rad($lat1);
        $lonFrom = deg2rad($lon1);
        $latTo   = deg2rad($lat2);
        $lonTo   = deg2rad($lon2);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(
            pow(sin($latDelta / 2), 2) +
                cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)
        ));

        return $earthRadius * $angle;
    }
}
