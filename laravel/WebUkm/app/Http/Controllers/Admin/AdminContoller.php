<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminContoller extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('Page.Pendaftar', compact('users'));
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'Pengguna berhasil dihapus.');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'fakultas' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'nim' => 'required|string|max:50|unique:users,nim,' . $id,
            'pilihan_ukm' => 'array',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->fakultas = $request->input('fakultas');
        $user->jurusan = $request->input('jurusan');
        $user->nim = $request->input('nim');
        $user->pilihan_ukm = implode(',', $request->input('pilihan_ukm', []));
        $user->email = $request->input('email');
        $user->level = $request->input('level');
        if ($request->input('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();
        return redirect()->back()->with('success', 'Data pengguna berhasil diperbarui.');
    }
}
