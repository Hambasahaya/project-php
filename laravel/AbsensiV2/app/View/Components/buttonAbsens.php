<?php

namespace App\View\Components;

use App\Models\Absensi;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class buttonAbsens extends Component
{
    public $chek = false;
    public $absenmasuk = false;
    public $absenpulang = false;
    public function __construct()
    {
        if (Auth::user()->face_descriptor != null) {
            $this->chek = true;
        }
        $this->absenmasuk = Absensi::where('user_id', Auth::user()->id)
            ->where('tanggal_absen', now()->toDateString())
            ->whereNotNull('jam_masuk')
            ->first();
        $this->absenpulang = Absensi::where('user_id', Auth::user()->id)
            ->where('tanggal_absen', now()->toDateString())
            ->whereNotNull('jam_pulang')
            ->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button-absens', [
            "chek_face" => $this->chek,
            "absenmasuk" => $this->absenmasuk,
            "absenpulang" => $this->absenpulang
        ]);
    }
}
