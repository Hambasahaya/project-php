<?php

namespace App\View\Components;

use App\Models\Absensi;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class tables_absens_all extends Component
{

    public function __construct() {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tables_absens_all');
    }
}
