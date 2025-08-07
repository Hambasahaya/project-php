<?php

namespace App\View\Components;

use App\Models\Kelas;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Mahasiswakelasabsen extends Component
{
    public $kelasabsen = null;
    public function __construct()
    {
        $this->kelasabsen = Kelas::with(['mahasiswa', 'kehadiran', 'dosen'])
            ->where('dosen_pengampu', Auth::user()->id)
            ->get();
    }
    public function render(): View|Closure|string
    {
        return view('components.mahasiswakelasabsen', ["kelasDosen" => $this->kelasabsen]);
    }
}
