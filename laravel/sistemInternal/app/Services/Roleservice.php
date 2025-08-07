<?php

namespace App\Services;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class Roleservice
{
    public static function createRole(array $data): RedirectResponse
    {

        $validator = Validator::make($data, [
            'role_name'       => 'required|string|max:255|unique:roles,role_name',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with("gagal_role", "Periksa Kembali Inputan Anda!");
        }
        $role = strtolower(trim($data['role_name']));
        $blockedKeywords = ['admin', 'human', 'resource', 'hr'];
        foreach ($blockedKeywords as $keyword) {
            if (str_contains($role, $keyword)) {
                return redirect()->back()->with("gagal_role", "Role ini sudah ada atau mirip dengan role penting!");
            }
        }
        $role = Role::create(['role_name' => strtolower($data['role_name'])]);
        return redirect()->back()->with("succsess_role", "Role Baru Berhasil Ditambahkan!");
    }
    public static function updateRole($id, array $data): RedirectResponse
    {
        try {
            $validator = Validator::make($data, [
                'role_name'       => 'required|string|max:255|unique:roles,role_name',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with("gagal_role", "Periksa Kembali Inputan Anda!");
            }
            $role = Role::find($id);
            if (!$role || strtolower($role->role_name) === 'admin' || strtolower($role->role_name) === 'hr') {
                return redirect()->back()->with("gagal_role", "Role Ini Tidak Boleh DiUbah!");
            }


            $role->update(['role_name' => strtolower($data['role_name'])]);
            return redirect()->back()->with("succsess_role", "Role {$data['role_name']} Berhasil Diubah");
        } catch (\Exception $e) {
            return redirect()->back()->with("gagal_role", $e->getMessage());
        }
    }


    public static function deleteRole($id): RedirectResponse
    {
        try {
            $role = Role::find($id);

            if (!$role) {
                return redirect()->back()->with("gagal_role", "Role tidak ditemukan!");
            }
            $normalizedRole = strtolower($role->role_name);
            $protectedRoles = ['admin', 'hr'];
            if (in_array($normalizedRole, $protectedRoles)) {
                return redirect()->back()->with("gagal_role", "Role ini tidak bisa dihapus!");
            }

            $userCount = User::where('role_id', $role->id)->count();
            if ($userCount > 0) {
                return redirect()->back()->with("gagal_role", "Role ini masih digunakan oleh {$userCount} user dan tidak bisa dihapus!");
            }

            $role->delete();
            return redirect()->back()->with("success_role", "Role berhasil dihapus.");
        } catch (\Exception $e) {
            return redirect()->back()->with("gagal_role", "Terjadi kesalahan: " . $e->getMessage());
        }
    }


    public static function getAllRoles()
    {
        return Role::where('role_name', '!=', 'admin')->get();
    }
    public static function getroleById($id)
    {
        $role = Role::find($id);
        if (!$role) {
            return Response::json(['success' => false, 'message' => 'role tidak ditemukan.'], 404);
        }

        return Response::json(['success' => true, 'data' => $role]);
    }
}
