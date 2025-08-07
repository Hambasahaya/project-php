<?php

namespace App\View\Components;

use App\Models\Absen;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Tables extends Component
{

    public $dataabsen_week = null;
    public function __construct()
    {
        $this->dataabsen_week = Absen::where('user_id', Auth::user()->id)
            ->whereBetween('tanggal', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ])->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.tables', [
            "dataabsen_week" => $this->dataabsen_week
        ]);
    }
}
