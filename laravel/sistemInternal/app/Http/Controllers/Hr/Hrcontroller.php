<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\AuthServices\AuthService;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Exports\RekapKaryawanExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class Hrcontroller extends Controller
{
    public function AddNewKaryawan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'       => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            "role_id"    => "required",
            "division_id"    => "required"
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('erorr_add_employee', "Periksa Kembali Inputan Anda");
        }
        $user = [
            'nama'        => $request['nama'],
            'email'       => $request['email'],
            'role_id'     => $request['role_id'],
            'division_id' => $request['division_id'],
        ];
        return AuthService::registerEmployee($user);
    }
    public function getdatakaryawanByid($id)
    {
        $user = User::select('id', 'nama', 'email')
            ->where('id', $id)
            ->with('role', 'divisi', 'detail')
            ->first();

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Karyawan tidak ditemukan.'], 404);
        }

        return response()->json(['success' => true, 'data' => $user], 200);
    }


    public function updateKaryawan($id, Request $request)
    {
        return AuthService::updateProfile($id, $request->all());
    }

    public static function Deletekaryawan($id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return redirect()->back()->with('erorr_add_employee', "User tidak ditemukan");
            }

            if ($user->id === Auth::id()) {
                return redirect()->back()->with('erorr_add_employee', "Anda tidak bisa menghapus akun sendiri!");
            }

            $roleName = strtolower(optional($user->role)->role_name);

            if ($roleName === 'admin') {
                $totalAdmin = User::whereHas('role', function ($query) {
                    $query->whereRaw('LOWER(role_name) = ?', ['admin']);
                })->count();

                if ($totalAdmin <= 1) {
                    return redirect()->back()->with(
                        'erorr_add_employee',
                        "Tidak bisa menghapus karyawan dengan role admin terakhir!"
                    );
                }
            }
            $user->delete();
            return redirect()->back()->with('success_add_employee', "Karyawan berhasil dihapus");
        } catch (\Exception $e) {
            return redirect()->back()->with('erorr_add_employee', $e->getMessage());
        }
    }

    public function exportExcelMerge()
    {
        return Excel::download(new RekapKaryawanExport('merge'), 'data_karyawan.xlsx');
    }
}
