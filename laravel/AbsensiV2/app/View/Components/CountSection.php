<?php

namespace App\View\Components;

use App\Models\Absensi;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class CountSection extends Component
{
    public $hadir = null;
    public $izin = null;
    public $sakit = null;
    public $cuti = null;
    public function __construct()
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $this->hadir = Absensi::where('user_id', Auth::user()->id)
            ->whereBetween('tanggal_absen', [$startOfWeek, $endOfWeek])
            ->where('status', 'hadir')
            ->count();

        $this->izin = Absensi::where('user_id', Auth::user()->id)
            ->whereBetween('tanggal_absen', [$startOfWeek, $endOfWeek])
            ->where('status', 'izin')
            ->count();

        $this->sakit = Absensi::where('user_id', Auth::user()->id)
            ->whereBetween('tanggal_absen', [$startOfWeek, $endOfWeek])
            ->where('status', 'sakit')
            ->count();
        $this->cuti = Absensi::where('user_id', Auth::user()->id)
            ->whereBetween('tanggal_absen', [$startOfWeek, $endOfWeek])
            ->where('status', 'cuti')
            ->count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.count-section', [
            "hadir" => $this->hadir,
            "izin" => $this->izin,
            "sakit" => $this->sakit,
            "cuti" => $this->cuti,
        ]);
    }
}
