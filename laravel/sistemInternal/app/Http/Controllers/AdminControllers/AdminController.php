<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Services\AdminServices\AdminService;
use App\Services\DivisionService;
use App\Services\Roleservice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function createHr(Request $request)
    {
        return AdminService::createHR($request->only('nama', "email"));
    }
    public function createRole(Request $request)
    {
        return Roleservice::createRole($request->only('role_name'));
    }
    public function UppdateRole(Request $request, $id)
    {
        return Roleservice::updateRole($id, $request->only('role_name'));
    }
    public function DeleteRole($id)
    {
        return Roleservice::DeleteRole($id);
    }
    public function getRoleById($id)
    {
        return Roleservice::getroleById($id);
    }
    public function AddDivison(Request $request)
    {
        return DivisionService::createDivision($request->only('nama_divisi'));
    }
    public function updateDivision(Request $request, $id)
    {
        return DivisionService::updateDivision($id, $request->only('nama_divisi'));
    }
    public function DeleteDivison($id)
    {
        return DivisionService::deleteDivision($id);
    }
    public function GetAllDivison()
    {
        return DivisionService::getAllDivisions();
    }
    public function getDivisiById($id)
    {
        return DivisionService::getDivisionById($id);
    }
}
