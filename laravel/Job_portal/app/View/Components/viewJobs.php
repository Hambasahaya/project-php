<?php

namespace App\View\Components;

use App\Models\lowongan_applys;
use App\Services\LowonganService;
use Closure;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class viewJobs extends Component
{
    public $data = [];
    public $chek = null;
    public $data_pelamar = null;
    public function __construct($id, LowonganService $lowonganService)
    {
        $this->data = $lowonganService->getLowonganById($id);
        $this->chek = $lowonganService->getPelamarById($id) ?? null;
        if (Auth::check()) {
            if (Auth::user()->role === "perusahaan") {
                $this->data_pelamar = lowongan_applys::with('perusahaan', 'pelamar')->where('lowongan_id', $id)->where('perusahaan_id', Auth::user()->id)->get();
            }
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.view-jobs', [
            'data' => $this->data,
            'chek' => $this->chek,
            'data_pelamar' => $this->data_pelamar,
        ]);
    }
}
