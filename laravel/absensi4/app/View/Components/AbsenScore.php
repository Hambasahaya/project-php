<?php

namespace App\View\Components;

use App\Models\Absen;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Closure;

class AbsenScore extends Component
{
    public $scores;

    public function __construct()
    {
        $user = Auth::user();
        $userId = $user->id;

        $kelasList = $user->kelas()->with('matakuliah')->get();
        $scores = [];

        foreach ($kelasList as $kelas) {
            $totalPertemuan = Absen::where('kelas_id', $kelas->id)
                ->distinct('pertemuan')
                ->count('pertemuan');

            $bolos = Absen::where('kelas_id', $kelas->id)
                ->where('user_id', $userId)
                ->where('status', 'alpa')
                ->count();

            $hadir = $totalPertemuan > 0 ? $totalPertemuan - $bolos : 0;
            $score = $totalPertemuan > 0 ? ($hadir / $totalPertemuan) * 100 : 0;

            $scores[] = [
                'kelas' => $kelas,
                'matakuliah' => $kelas->matakuliah->nama_matakuliah ?? 'Tidak Diketahui',
                'score' => round($score)
            ];
        }
        $this->scores = $scores;
    }

    public function render(): View|Closure|string
    {
        return view('components.absen-score');
    }
}
