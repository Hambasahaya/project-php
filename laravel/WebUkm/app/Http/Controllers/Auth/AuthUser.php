<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthUser extends Controller
{
    public function Register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'fakultas' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'nim' => 'required|max:50|unique:users,nim',
            'pilihan_ukm' => 'array',
            'email_sign' => 'required|string|email|max:255|unique:users,email',
            'password_sign' => 'required|string|min:8',
        ]);

        $pilihanUkm = implode(',', $request->input('pilihan_ukm', []));
        try {
            $user = User::create([
                'name' => $request->input('nama'),
                'fakultas' => $request->input('fakultas'),
                'jurusan' => $request->input('jurusan'),
                'nim' => $request->input('nim'),
                'pilihan_ukm' => $pilihanUkm,
                'email' => $request->input('email_sign'),
                'level' => 'pendaftar',
                'password' => Hash::make($request->input('password_sign'))
            ]);
            Auth::login($user);

            return redirect()->to('/finis')->with('success', 'Registrasi berhasil, Anda sudah login.');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    public function LogIn(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->level == 'admin') {
                return redirect()->to(route('admin.users.index'))->with('success', 'Login berhasil, Selamat datang Admin.');
            }
            return redirect()->to('/finis')->with('success', 'Login berhasil.');
        }

        return redirect()->back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function LogOut(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->to('/login')->with('success', 'Anda telah logout.');
    }
}
