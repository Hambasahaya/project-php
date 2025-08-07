<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $auth;
    public function __construct(AuthService $auth)
    {
        $this->auth = $auth;
    }
    public function addmhs(Request $request)
    {
        $request->validate([
            'nama'  => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
        ]);
        $request["role"] = "mahasiswa";
        try {
            $user = $this->auth->registerAccount($request->only('nama', 'email', 'role'));
            return back()->with('berhasil_register', "Akun Mahasiswa {$request->nama} berhasil dibuat.");
        } catch (\Exception $e) {
            return back()->with('gagal_register', "Gagal membuat akun mahasiswa, kesalahan: " . $e->getMessage());
        }
    }
    public function updateMahasiswa(Request $request, $id)
    {
        $request->validate([
            'nama'  => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6'
        ]);

        try {
            $user = \App\Models\User::where('role', 'mahasiswa')->findOrFail($id);
            $user->nama  = $request->nama;
            $user->email = $request->email;
            if ($request->filled('password')) {
                $user->password = bcrypt($request->password);
            }
            $user->save();
            $this->auth->updateOrCreateDetail($request, $user->id);

            return back()->with('berhasil_register', "Data Mahasiswa {$user->nama} berhasil diperbarui.");
        } catch (\Exception $e) {
            return back()->with('gagal_register', "Gagal memperbarui data mahasiswa: " . $e->getMessage());
        }
    }

    public function deleteMahasiswa($id)
    {
        try {
            $user = \App\Models\User::where('role', 'mahasiswa')->findOrFail($id);
            $user->delete();

            return back()->with('berhasil_register', "Mahasiswa {$user->nama} berhasil dihapus.");
        } catch (\Exception $e) {
            return back()->with('gagal_register', "Gagal menghapus data mahasiswa: " . $e->getMessage());
        }
    }

    public function adddosen(Request $request)
    {
        $request->validate([
            'nama'  => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
        ]);
        $request["role"] = "dosen";
        try {
            $user = $this->auth->registerAccount($request->only('nama', 'email', 'role'));
            return back()->with('berhasil_register', "Akun dosen {$request->nama} berhasil dibuat.");
        } catch (\Exception $e) {
            return back()->with('gagal_register', "Gagal membuat akun dosen, kesalahan: " . $e->getMessage());
        }
    }
    public function updatedosen(Request $request, $id)
    {
        $request->validate([
            'nama'  => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6',
            'nuptk' => 'nullable|string',
            "no_hp" => 'nullable|string',
            "alamat" => 'nullable|string',
        ]);

        try {
            $user = \App\Models\User::where('role', 'dosen')->findOrFail($id);
            $user->nama  = $request->nama;
            $user->email = $request->email;
            if ($request->filled('password')) {
                $user->password = bcrypt($request->password);
            }
            $user->save();
            $this->auth->updateOrCreateDetail($request, $user->id);

            return back()->with('berhasil_register', "Data Dosen {$user->nama} berhasil diperbarui.");
        } catch (\Exception $e) {
            return back()->with('gagal_register', "Gagal memperbarui data dosen: " . $e->getMessage());
        }
    }
    public function deletedosen($id)
    {
        try {
            $user = \App\Models\User::where('role', 'dosen')->findOrFail($id);
            $digunakanDiKelas = \App\Models\Kelas::where('dosen_pengampu', $id)->exists();

            if ($digunakanDiKelas) {
                return back()->with('gagal_register', "Dosen {$user->nama} tidak dapat dihapus karena masih digunakan sebagai pengampu kelas.");
            }

            $user->delete();
            return back()->with('berhasil_register', "Dosen {$user->nama} berhasil dihapus.");
        } catch (\Exception $e) {
            return back()->with('gagal_register', "Gagal menghapus data dosen: " . $e->getMessage());
        }
    }
}
