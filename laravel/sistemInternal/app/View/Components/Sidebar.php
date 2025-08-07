<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Sidebar extends Component
{

    public $menu = [];
    public function __construct()
    {
        $menu = [
            "Absen" => route('Absen'),
            "Task" => route('Task')
        ];

        $role = Auth::user()->role->role_name;

        if ($role === "admin") {
            $menu = array_merge($menu, [
                "manage-HR" => "/createHr",
                "manage-Divisi" => route('Managedivisi'),
                "manage-Role" => route('Managerole')
            ]);
        } elseif ($role === "hr") {
            $menu = array_merge($menu, [
                "manage-Employee" => route('ManageEmployee'),
            ]);
        }

        $this->menu = $menu;
    }


    public function render(): View|Closure|string
    {
        return view('components.sidebar');
    }
}
