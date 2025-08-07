<?php

namespace App\View\Components;

use App\Models\Division;
use App\Models\Role;
use App\Models\User;
use App\Services\AbsenServices\AbesenService;
use App\Services\AdminServices\AdminService;
use App\Services\DivisionService;
use App\Services\Roleservice;
use App\Services\TaskService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class table extends Component
{
    public $data;
    public $datarole;
    public $datadivisi;
    public function __construct()
    {
        if (Auth::user()->role->role_name === "admin" && request()->routeIs('Managehr')) {
            $this->data = AdminService::getAllHR();
        } elseif (Auth::user()->role->role_name === "admin" && request()->routeIs('Managedivisi')) {
            $this->data = DivisionService::getAllDivisions();
        } elseif (Auth::user()->role->role_name === "admin" && request()->routeIs('Managerole')) {
            $this->data = Roleservice::getAllRoles();
        } elseif (request()->routeIs('Absen')) {
            $this->data = AbesenService::getDataAbsenUser();
        } elseif (request()->routeIs('Task')) {
            $this->data = TaskService::getTaskUser();
        } elseif (Auth::user()->role->role_name === "hr" && request()->routeIs('ManageEmployee')) {
            $this->data = User::with(['role', 'divisi'])
                ->whereHas('role', fn($q) => $q->where('role_name', '!=', ''))
                ->whereHas('divisi', fn($q) => $q->where('nama_divisi', '!=', ''))
                ->get();
            $this->datarole = Role::where('role_name', '!=', '')->get();
            $this->datadivisi = Division::where('nama_divisi', '!=', '')->get();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table', [
            'data' => $this->data,
            "datarole" => $this->datarole,
            "datadivisi" => $this->datadivisi
        ]);
    }
}
