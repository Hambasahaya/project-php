<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Listmatkul extends Component
{
    public $recent = null;
    public $upcoming = null;
    public $datakelas = null;
    public function __construct()
    {



        $today = Carbon::now();
        $dayName = $today->locale('id')->isoFormat('dddd');
        $user = Auth::user();
        $this->datakelas = $user->kelas()
            ->with(['matakuliah', 'dosen'])
            ->get();

        $this->upcoming = $user->kelas()
            ->whereIn('hari', $this->getUpcomingDays($dayName))
            ->orderByRaw("FIELD(hari, 'Senin','Selasa','Rabu','Kamis','Jumat')")
            ->get();
        $this->recent = $user->kelas()
            ->whereIn('hari', $this->getPastDays($dayName))
            ->orderByRaw("FIELD(hari,'Jumat','Kamis','Rabu','Selasa','Senin')")
            ->get();
    }

    private function getUpcomingDays($today)
    {
        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        $index = array_search($today, $days);
        return array_slice($days, $index);
    }

    private function getPastDays($today)
    {
        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        $index = array_search($today, $days);
        return array_reverse(array_slice($days, 0, $index));
    }

    public function render(): View|Closure|string
    {
        return view('components.listmatkul', [
            "upcoming" => $this->upcoming,
            "recent" => $this->recent,
            "data_kelas" => $this->datakelas
        ]);
    }
}
