<?php

namespace App\View\Components;

use App\Models\Kelas;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Mahasiswakelas extends Component
{
    public $kelas = null;
    public function __construct()
    {
        $this->kelas = Kelas::with(['mahasiswa'])
            ->where('dosen_pengampu', Auth::user()->id)
            ->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.mahasiswakelas', ["kelasDosen" => $this->kelas]);
    }
}
