<?php

namespace App\View\Components;

use App\Models\Absensi;
use App\Models\Leave_Ticket;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class tables extends Component
{
    public $dataabsen = null;
    public $leavedata = null;
    public $dataall = null;
    public function __construct()
    {
        $this->dataabsen = Absensi::whereBetween('tanggal_absen', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->get();
        if (Auth::user()->role === "HR") {
            $this->leavedata = Leave_Ticket::with('user')->latest()->get();
        } else {
            $this->leavedata = Leave_Ticket::with('user')->latest()->where('user_id', Auth::user()->id)->get();
        }

        $this->dataall = Absensi::with('user')
            ->whereHas('user', fn($q) => $q->where('role', '!=', 'HR'))
            ->whereBetween('tanggal_absen', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->orderByDesc('tanggal_absen')
            ->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.tables', [
            "dataabsen" => $this->dataabsen,
            "pengajuan" => $this->leavedata,
            "dataall" => $this->dataall
        ]);
    }
}
