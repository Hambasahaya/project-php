<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Helpers\FaceHelper;
use App\Models\Absensi;

class AbsenService
{
    const JAM_KERJA = '09:00';
    const TOLERANSI_MENIT = 10;
    const JAM_PULANG = '16:00';

    public function absen(array $data)
    {
        $loggedInUser = Auth::user();
        $storedDescriptor = $loggedInUser->face_descriptor;

        $faceMatchResponse = $this->matchFace([
            'face_descriptor_input' => $data['face_descriptor'],
            'face_descriptor_user' => $storedDescriptor,
        ]);

        if ($faceMatchResponse->status() !== 200 || !$faceMatchResponse->getData()->matched) {
            return response()->json(['message' => 'Face tidak dikenali. Absen ditolak.'], 422);
        }

        $userId = $loggedInUser->id;
        $tanggal = Carbon::now()->toDateString();
        $waktu = Carbon::now();

        $absen = Absensi::firstOrNew([
            'user_id' => $userId,
            'tanggal_absen' => $tanggal,
        ]);

        if ($data['type'] === 'masuk') {
            if ($absen->jam_masuk) {
                return response()->json(['message' => 'Anda sudah absen masuk hari ini.'], 422);
            }

            $jamKerja = Carbon::parse(self::JAM_KERJA);
            $isTerlambat = $waktu->greaterThan($jamKerja->addMinutes(self::TOLERANSI_MENIT));

            $absen->jam_masuk = $waktu->format('H:i:s');
            $absen->terlambat = $isTerlambat;
            $absen->status = 'hadir';
        } elseif ($data['type'] === 'pulang') {
            if ($absen->jam_pulang) {
                return response()->json(['message' => 'Anda sudah absen pulang hari ini.'], 422);
            }

            $jamPulangMinimal = Carbon::parse(self::JAM_PULANG);
            if ($waktu->lt($jamPulangMinimal)) {
                return response()->json([
                    'message' => 'Absen pulang hanya bisa dilakukan setelah jam 16:00 WIB',
                ], 422);
            }

            $absen->jam_pulang = $waktu->format('H:i:s');

            if (!$absen->jam_masuk) {
                $absen->status = 'alpa';
            }
        }

        $absen->save();

        return response()->json([
            'message' => "Absen {$data['type']} berhasil",
            'user_id' => $userId,
            'user_name' => $loggedInUser->nama,
        ]);
    }

    public function matchFace(array $descriptor)
    {
        $input = $descriptor['face_descriptor_input'];
        $stored = $descriptor['face_descriptor_user'];

        if (!is_array($input) || !is_array($stored)) {
            return response()->json([
                'message' => 'Format face descriptor tidak valid.'
            ], 400);
        }

        $distance = FaceHelper::euclideanDistance($input, $stored);

        return response()->json([
            'message' => $distance < 0.6 ? 'Wajah cocok.' : 'Wajah tidak cocok.',
            'matched' => $distance < 0.6,
            'distance' => $distance,
        ]);
    }
}
