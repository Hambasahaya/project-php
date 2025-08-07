<?php

namespace App\View\Components;

use App\Services\LowonganService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class listPekerjaan extends Component
{
    public $data = [];
    public function __construct()
    {
        $this->data = LowonganService::getAllLowongan();
    }
    public function render(): View|Closure
    {
        return view('components.list-pekerjaan', ["data" => $this->data]);
    }
}
