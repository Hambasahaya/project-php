<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AbsenController extends Controller
{
    public function scan(Request $request)
    {
        $request->validate([
            'qrcode' => 'required|string',
        ]);

        $user = Auth::user();
        $now = Carbon::now();

        $kelas = Kelas::where('uuid', $request->qrcode)->first();

        if (!$kelas) {
            return response()->json(['status' => 'error', 'message' => 'QR code tidak valid'], 404);
        }

        $isMember = $kelas->mahasiswa()->where('user_id', $user->id)->exists();
        if (!$isMember) {
            return response()->json(['status' => 'error', 'message' => 'Anda tidak terdaftar di kelas ini'], 403);
        }

        $sudahAbsen = Absen::where('user_id', $user->id)
            ->where('kelas_id', $kelas->id)
            ->whereDate('tanggal_absen', $now->toDateString())
            ->exists();

        if ($sudahAbsen) {
            return response()->json(['status' => 'warning', 'message' => 'Anda sudah absen hari ini']);
        }

        $jadwalMulai = Carbon::parse($kelas->jam_mulai);
        $tanggalDanJamMulai = Carbon::createFromFormat('Y-m-d H:i:s', $now->format('Y-m-d') . ' ' . $jadwalMulai->format('H:i:s'));

        if ($now->lt($tanggalDanJamMulai)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Belum waktunya absen. Absen hanya bisa dilakukan setelah jam masuk.',
            ], 403);
        }

        $keterangan = $now->gt($tanggalDanJamMulai) ? 'telat' : 'masuk';
        $pertemuanKe = Absen::where('kelas_id', $kelas->id)->distinct('tanggal_absen')->count() + 1;
        Absen::create([
            'user_id'       => $user->id,
            'kelas_id'      => $kelas->id,
            'tanggal_absen' => $now->toDateString(),
            'waktu_masuk'   => $now->format('H:i:s'),
            'keterangan'    => $keterangan,
            'status'        => "Hadir",
            'pertemuan'   => $pertemuanKe,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => "Absen berhasil: {$keterangan}",
            'data' => [
                'kelas' => $kelas->kode_kelas,
                'waktu' => $now->format('H:i:s'),
                'keterangan' => $keterangan,
            ]
        ]);
    }
}
