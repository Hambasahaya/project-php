<?php

namespace App\Services\AbsenServices;

use App\Models\Absen;
use App\Models\User;
use App\Services\FileService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AbesenService
{
    protected static float $officeLat = -6.200000;
    protected static float $officeLng = 106.816666;
    protected static float $tolerance = 6;



    public static function absen(array $data): RedirectResponse
    {
        $user = Auth::user();
        $status = self::checkAbsen();

        $validator = Validator::make($data, [
            'foto_absen' => 'required|image|max:5120',
            'latitude'   => 'required|string|max:255',
            'longitude'  => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with("gagal_absen", "Anda Belum Mengizinkan Lokasi Ataupun Mengirimkan Foto Absen!");
        }

        if (!($data['foto_absen'] instanceof \Illuminate\Http\UploadedFile)) {
            return redirect()->back()->with('gagal_absen', "foto anda tidak valid!");
        }

        // $distance = self::calculateDistance($data["latitude"], $data["longitude"]);
        // if ($distance > self::$tolerance) {
        //     return redirect()->back()->with('gagal_absen', "Lokasi Anda terlalu jauh dari Kantor!");
        // }

        if ($status['status_absen']) {
            return redirect()->back()->with('gagal_absen', "Anda Sudah Absen Hari ini!");
        }

        $fotoPath = FileService::upload($data['foto_absen'], 'foto_absen');
        Absen::create([
            'user_id'      => $user->id,
            'foto_absen'   => $fotoPath,
            'lokasi_absen' => $data["latitude"] . ',' . $data["longitude"],
            'tanggal'      => now()->toDateString(),
            'jam_masuk'    => now()->toTimeString(),
            'status'       => 'hadir',
        ]);

        return redirect()->back()->with('succsess_absen', "Absen Anda Diterima!");
    }

    protected static function calculateDistance($lat, $lng)
    {
        $earthRadius = 6371000;
        $dLat = deg2rad($lat - self::$officeLat);
        $dLng = deg2rad($lng - self::$officeLng);

        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad(self::$officeLat)) * cos(deg2rad($lat)) *
            sin($dLng / 2) * sin($dLng / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $earthRadius * $c;

        return $distance;
    }
    public static function cekAbsenAlpha()
    {
        $today = now()->toDateString();

        $users = User::all();

        foreach ($users as $user) {
            $absen = Absen::where('user_id', $user->id)
                ->where('tanggal', $today)
                ->first();

            if (!$absen) {
                Absen::create([
                    'user_id'      => $user->id,
                    'tanggal'      => $today,
                    'status'       => 'alpha',
                    'lokasi_absen' => null,
                    'foto_absen'   => null,
                    'jam_masuk'    => null,
                    'jam_pulang'   => null,
                ]);
            }
        }

        return ['success' => true, 'message' => 'Pengecekan Alpha selesai.'];
    }
    public static function checkAbsen(): array
    {
        $userId = Auth::user()->id;
        $today = now()->toDateString();

        $absen = Absen::where('user_id', $userId)
            ->where('tanggal', $today)
            ->first();

        if (!$absen) {
            return ['status_absen' => false];
        }

        if ($absen->jam_masuk && $absen->jam_pulang) {
            return ['status_absen' => true];
        }

        if ($absen->jam_masuk && !$absen->jam_pulang) {
            return ['status_absen' => 'datang'];
        }

        if (!$absen->jam_masuk && $absen->jam_pulang) {
            return ['status_absen' => 'pulang'];
        }

        return ['status_absen' => false];
    }

    public static function getDataAbsenUser()
    {
        return Absen::where('user_id', Auth::user()->id)
            ->orderBy('tanggal', 'desc')
            ->get();
    }

    public static function getAllDataAbsen()
    {
        return Absen::with('user')
            ->orderBy('tanggal', 'asc')
            ->get();
    }
    public static function getAllDataAbsenByDivisi(string $divisi)
    {
        return Absen::whereHas('user', function ($query) use ($divisi) {
            $query->where('divisi', $divisi)
                ->where('divisi', '!=', 'hr');
        })
            ->with('user')
            ->orderBy('tanggal', 'desc')
            ->get();
    }
    public static function getStatusStatistikPerBulan($year, $month)
    {
        return Absen::selectRaw('status, COUNT(*) as total')
            ->whereYear('tanggal', $year)
            ->whereMonth('tanggal', $month)
            ->groupBy('status')
            ->pluck('total', 'status');
    }
    public static function getKehadiranHarian($year, $month)
    {
        return Absen::selectRaw('tanggal, COUNT(*) as total')
            ->whereYear('tanggal', $year)
            ->whereMonth('tanggal', $month)
            ->where('status', 'hadir')
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->pluck('total', 'tanggal');
    }
    public static function getRataRataHadirPerDivisi($year, $month)
    {
        return Absen::whereYear('tanggal', $year)
            ->whereMonth('tanggal', $month)
            ->where('status', 'hadir')
            ->whereHas('user', fn($q) => $q->where('divisi', '!=', 'hr'))
            ->with('user')
            ->get()
            ->groupBy(fn($absen) => $absen->user->divisi)
            ->map(fn($group) => $group->count());
    }
    public static function getPersentaseHadirUser($year, $month)
    {
        $totalHari = now()->setYear($year)->setMonth($month)->daysInMonth;

        return User::where('role', '!=', 'hr')
            ->withCount(['absens as hadir_count' => function ($q) use ($year, $month) {
                $q->where('status', 'hadir')
                    ->whereYear('tanggal', $year)
                    ->whereMonth('tanggal', $month);
            }])
            ->get()
            ->mapWithKeys(function ($user) use ($totalHari) {
                return [$user->name => round(($user->hadir_count / $totalHari) * 100, 1)];
            });
    }
    public static function getKehadiranPerMinggu($year, $month)
    {
        return Absen::selectRaw('WEEK(tanggal, 1) as minggu_ke, COUNT(*) as total')
            ->whereYear('tanggal', $year)
            ->whereMonth('tanggal', $month)
            ->where('status', 'hadir')
            ->groupBy('minggu_ke')
            ->orderBy('minggu_ke')
            ->pluck('total', 'minggu_ke');
    }
    public static function getKehadiranPerBulan($year)
    {
        return Absen::selectRaw('MONTH(tanggal) as bulan, COUNT(*) as total')
            ->whereYear('tanggal', $year)
            ->where('status', 'hadir')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan');
    }
    public static function getStatistikBulananUser(int $year, int $month, ?int $userId = null)
    {
        $userId = $userId ?? Auth::user()->id;

        return Absen::selectRaw('status, COUNT(*) as total')
            ->where('user_id', $userId)
            ->whereYear('tanggal', $year)
            ->whereMonth('tanggal', $month)
            ->groupBy('status')
            ->pluck('total', 'status');
    }
    public static function getKehadiranHarianUser(int $year, int $month, ?int $userId = null)
    {
        $userId = $userId ?? Auth::user()->id;

        return Absen::selectRaw('tanggal, status')
            ->where('user_id', $userId)
            ->whereYear('tanggal', $year)
            ->whereMonth('tanggal', $month)
            ->orderBy('tanggal')
            ->get()
            ->mapWithKeys(fn($absen) => [$absen->tanggal => $absen->status]);
    }
    public static function getKehadiranPerMingguUser(int $year, int $month, ?int $userId = null)
    {
        $userId = $userId ?? Auth::user()->id;

        return Absen::selectRaw('WEEK(tanggal, 1) as minggu_ke, COUNT(*) as total')
            ->where('user_id', $userId)
            ->whereYear('tanggal', $year)
            ->whereMonth('tanggal', $month)
            ->where('status', 'hadir')
            ->groupBy('minggu_ke')
            ->orderBy('minggu_ke')
            ->pluck('total', 'minggu_ke');
    }
    public static function getKehadiranPerBulanUser(int $year, ?int $userId = null)
    {
        $userId = $userId ?? Auth::user()->id;

        return Absen::selectRaw('MONTH(tanggal) as bulan, COUNT(*) as total')
            ->where('user_id', $userId)
            ->whereYear('tanggal', $year)
            ->where('status', 'hadir')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan');
    }
    public static function UpdateStatusAbsen($id, $newstatus)
    {
        try {
            $absen = Absen::find($id);
            if (!$absen) {
                return back()->with('gagal_absen', "data absen gagal di update!");
            }
            $absen->status = $newstatus;
            $absen->save();
            return back()->with('succsess_absen', "Status absen berhasil di perbaharui");
        } catch (\Exception $e) {
            return back()->with('gagal_absen', "terjadi kendala");
        }
    }
}
