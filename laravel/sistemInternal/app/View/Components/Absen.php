<?php

namespace App\View\Components;

use App\Services\AbsenServices\AbesenService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Absen extends Component
{
    public $statusAbsen;
    public function __construct()
    {
        $this->statusAbsen = AbesenService::checkAbsen();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.absen');
    }
}
