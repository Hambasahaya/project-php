<?php

namespace App\View\Components;

use App\Services\LowonganService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Joblist extends Component
{
    public $jobdata = [];
    public function __construct()
    {
        $this->jobdata = LowonganService::getAllLowonganByUserId(Auth::user()->id);
    }


    public function render(): View|Closure|string
    {
        return view('components.joblist', ["jobs" => $this->jobdata]);
    }
}
