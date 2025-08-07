<?php

namespace App\View\Components;

use App\Models\Absen;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use Carbon\Carbon;

class headerinfo extends Component
{
    public $chekAbsenmasuk = null;
    public $chekAbsenpulang = null;
    public $hadir = null;
    public $izin = null;
    public $sakit = null;
    public $terlambat = null;
    public $stafcount = null;
    public function __construct()
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $this->chekAbsenmasuk = Absen::where('user_id', Auth::user()->id)
            ->where('tanggal', now()->toDateString())
            ->whereNotNull('jam_masuk')
            ->first();
        $this->chekAbsenpulang = Absen::where('user_id', Auth::user()->id)
            ->where('tanggal', now()->toDateString())
            ->whereNotNull('jam_pulang')
            ->first();
        $this->hadir = Absen::where('user_id', Auth::user()->id)
            ->whereBetween('tanggal', [$startOfWeek, $endOfWeek])
            ->where('status', 'hadir')
            ->count();

        $this->izin = Absen::where('user_id', Auth::user()->id)
            ->whereBetween('tanggal', [$startOfWeek, $endOfWeek])
            ->where('status', 'izin')
            ->count();

        $this->sakit = Absen::where('user_id', Auth::user()->id)
            ->whereBetween('tanggal', [$startOfWeek, $endOfWeek])
            ->where('status', 'sakit')
            ->count();

        $this->terlambat = Absen::where('user_id', Auth::user()->id)
            ->whereBetween('tanggal', [$startOfWeek, $endOfWeek])
            ->where('terlambat', '1')
            ->count();
        $this->stafcount = User::where('level', 'Staff')->count();
    }



    public function render(): View|Closure|string
    {
        return view('components.headerinfo', [
            "masuk" => $this->chekAbsenmasuk,
            "pulang" => $this->chekAbsenpulang,
            "hadir" => $this->hadir,
            "izin" => $this->izin,
            "sakit" => $this->sakit,
            "terlambat" => $this->terlambat,
            "StafCount" => $this->stafcount
        ]);
    }
}
