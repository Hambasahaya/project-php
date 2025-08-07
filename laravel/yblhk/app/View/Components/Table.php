<?php

namespace App\View\Components;

use App\Models\Katgori_laporans;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;

class Table extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $data = null;
        if (Auth::user()->level === "admin") {
            $data = Laporan::with('user')->with('kategori')->get();
        }
        if (Auth::user()->level === "user") {
            $data = Laporan::with('user')->with('kategori')->where('id_users', Auth::user()->id)->get();
        }
        $kategori = Katgori_laporans::all();
        return view('components.table', ['laporans' => $data, 'kategori' => $kategori]);
    }
}
