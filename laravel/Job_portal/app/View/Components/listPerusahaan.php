<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class listPerusahaan extends Component
{
    public $dataperusahan = null;
    public function __construct()
    {
        $this->dataperusahan = User::with('detailUser')->where('role', 'perusahaan')->get();
    }
    public function render(): View|Closure|string
    {
        return view('components.list-perusahaan', ["datapr" => $this->dataperusahan]);
    }
}
