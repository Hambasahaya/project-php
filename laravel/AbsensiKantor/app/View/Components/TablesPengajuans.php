<?php

namespace App\View\Components;

use App\Models\Pengajuan;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class TablesPengajuans extends Component
{
    public $pengajuans = null;
    public function __construct()
    {
        if (Auth::user()->level === "HR") {
            $this->pengajuans = Pengajuan::all();
        } else {
            $this->pengajuans = Pengajuan::where('user_id', Auth::user()->id)->get();
        }
    }


    public function render(): View|Closure|string
    {
        return view('components.pengajuans', ["pengajuans" => $this->pengajuans]);
    }
}
