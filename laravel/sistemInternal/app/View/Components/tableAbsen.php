<?php

namespace App\View\Components;

use App\Services\AbsenServices\AbesenService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class tableAbsen extends Component
{
    public $data = [];
    public function __construct()
    {
        if (Auth::user()->role->role_name === "hr") {
            $this->data = AbesenService::getAllDataAbsen();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tableAbsen', ["data" => $this->data]);
    }
}
