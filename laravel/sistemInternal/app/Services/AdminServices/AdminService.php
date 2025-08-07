<?php

namespace App\Services\AdminServices;

use App\Models\User;
use App\Models\Division;
use App\Models\Role;
use App\Services\AuthServices\AuthService;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AdminService
{
    public static function createHR(array $data)
    {
        $validator = Validator::make($data, [
            'nama'       => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
        ]);
        if ($validator->fails()) {
            return ['success' => false, 'message' => $validator->errors()];
        }
        $role = Role::where("role_name", 'hr')->first();
        $divisi = Division::where("nama_divisi", 'hr')->first();
        if (!$role && !$divisi) {
            return redirect()->back()->with('erorr_add_employee', "Role dan Divisi Untuk hr belum Di buat!");
        }
        $user = [
            'nama'        => $data['nama'],
            'email'       => $data['email'],
            'role_id'     => $role->id,
            'division_id' => $divisi->id,
        ];
        return AuthService::registerEmployee($user);
    }
    public static function getAllHR()
    {
        return
            User::whereHas('role', fn($q) => $q->where('role_name', 'hr'))
            ->get();
    }
}
