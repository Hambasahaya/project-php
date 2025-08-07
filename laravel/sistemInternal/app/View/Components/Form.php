<?php

namespace App\View\Components;

use App\Models\Division;
use App\Models\Role;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public function render(): View|Closure|string
    {
        $divisi = Division::all();
        $role = Role::all();
        return view('components.form', compact($divisi, $role));
    }
}
