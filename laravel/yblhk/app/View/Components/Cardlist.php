<?php

namespace App\View\Components;

use App\Models\Laporan;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class Cardlist extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        if (Auth::user()->level === "admin") {
            $data = Laporan::select('statusLaporan', DB::raw('COUNT(*) as total'))
                ->groupBy('statusLaporan')
                ->pluck('total', 'statusLaporan');
            $dataLine = Laporan::select(
                DB::raw('DATE_FORMAT(created_at, "%M %Y") as bulan'),
                DB::raw('COUNT(*) as total')
            )
                ->groupBy('bulan')
                ->orderByRaw('MIN(created_at)')
                ->pluck('total', 'bulan');
            $dataKategori = Laporan::with('kategori')
                ->select('kategori_laporan', DB::raw('COUNT(*) as total'))
                ->groupBy('kategori_laporan')
                ->get()
                ->mapWithKeys(function ($item) {
                    return [$item->kategori->kategori_laporan => $item->total];
                });

            $dataStatusBulanan = Laporan::select(
                DB::raw('DATE_FORMAT(created_at, "%M %Y") as bulan'),
                'statusLaporan',
                DB::raw('COUNT(*) as total')
            )
                ->groupBy('bulan', 'statusLaporan')
                ->orderByRaw('MIN(created_at)')
                ->get()
                ->groupBy('statusLaporan');
            $totalLaporan = Laporan::count();
            $totalSelesai = Laporan::where('statusLaporan', 'laporan selesai')->count();
            $totalPending = Laporan::where('statusLaporan', '!=', 'laporan selesai')->count();
            $dataByAge = Laporan::select(
                DB::raw('TIMESTAMPDIFF(YEAR, users.tanggalLahir, CURDATE()) as umur'),
                DB::raw('COUNT(DISTINCT laporans.id_users) as total_pelapor')
            )
                ->join('users', 'laporans.id_users', '=', 'users.id')
                ->groupBy('umur')
                ->orderBy('umur')
                ->get();
            $dataByGender = Laporan::select(
                'users.gender',
                DB::raw('COUNT(DISTINCT laporans.id_users) as total_pelapor')
            )
                ->join('users', 'laporans.id_users', '=', 'users.id')
                ->groupBy('users.gender')
                ->get();
            $categoryGenderMax = Laporan::select(
                'katgori_laporans.kategori_laporan',
                'users.gender',
                DB::raw('COUNT(*) as jumlah')
            )
                ->join('users', 'laporans.id_users', '=', 'users.id')
                ->join('katgori_laporans', 'laporans.kategori_laporan', '=', 'katgori_laporans.id')
                ->groupBy('katgori_laporans.kategori_laporan', 'users.gender')
                ->get();

            $categoryAgeMax = Laporan::select(
                'katgori_laporans.kategori_laporan',
                DB::raw('TIMESTAMPDIFF(YEAR, users.tanggalLahir, CURDATE()) as umur'),
                DB::raw('COUNT(*) as jumlah')
            )
                ->join('users', 'laporans.id_users', '=', 'users.id')
                ->join('katgori_laporans', 'laporans.kategori_laporan', '=', 'katgori_laporans.id')
                ->groupBy('katgori_laporans.kategori_laporan', 'umur')
                ->get()
                ->groupBy('nama_kategori')
                ->map(function ($group) {
                    return $group->sortByDesc('jumlah');
                });
            return view('components.cardlist', compact(
                'data',
                'dataLine',
                'dataKategori',
                'dataStatusBulanan',
                'totalSelesai',
                'totalPending',
                'categoryAgeMax',
                'categoryGenderMax',
                'dataByGender',
                'dataByAge'
            ));
        }
        if (Auth::user()->level === "user") {
            $data = Laporan::select('statusLaporan', DB::raw('COUNT(*) as total'))
                ->groupBy('statusLaporan')
                ->where('id_users', Auth::user()->id)
                ->pluck('total', 'statusLaporan');
            $dataLine = Laporan::select(
                DB::raw('DATE_FORMAT(created_at, "%M %Y") as bulan'),
                DB::raw('COUNT(*) as total')
            )
                ->groupBy('bulan')
                ->orderByRaw('MIN(created_at)')
                ->where('id_users', Auth::user()->id)
                ->pluck('total', 'bulan');
            $dataKategori = Laporan::with('kategori')
                ->select('kategori_laporan', DB::raw('COUNT(*) as total'))
                ->groupBy('kategori_laporan')
                ->where('id_users', Auth::user()->id)
                ->get()
                ->mapWithKeys(function ($item) {
                    return [$item->kategori->kategori_laporan => $item->total];
                });
            $dataStatusBulanan = Laporan::select(
                DB::raw('DATE_FORMAT(created_at, "%M %Y") as bulan'),
                'statusLaporan',
                DB::raw('COUNT(*) as total')
            )
                ->groupBy('bulan', 'statusLaporan')
                ->orderByRaw('MIN(created_at)')
                ->where('id_users', Auth::user()->id)
                ->get()
                ->groupBy('statusLaporan');
            $totalLaporan = Laporan::count();
            $totalSelesai = Laporan::where('statusLaporan', 'laporan selesai')->where('id_users', Auth::user()->id)->count();
            $totalPending = Laporan::where('statusLaporan', '!=', 'laporan selesai')->where('id_users', Auth::user()->id)->count();
            return view('components.cardlist', compact(
                'data',
                'dataLine',
                'dataKategori',
                'dataStatusBulanan',
                'totalSelesai',
                'totalPending'
            ));
        }
        return view('components.cardlist');
    }
}
