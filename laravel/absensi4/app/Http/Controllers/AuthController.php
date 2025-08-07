<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected $auth;
    public function __construct(AuthService $auth)
    {
        $this->auth = $auth;
    }

    public function login(Request $request)
    {
        $request->validate([
            'nim' => 'required|string',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('nim', 'password');
        if ($this->auth->login($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role === "admin") {
                return redirect('/admin');
            }
            if (Auth::user()->role === "dosen") {
                return redirect('/dosen');
            }
            return redirect('/');
        }
        return back()->with('fail_login', 'NIM atau password salah.')->withInput();
    }

    public function showVerif()
    {
        return view('verif');
    }

    public function sendResetToken(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        if (!$this->auth->sendResetToken($request->email)) {
            return back()->with('fail_login', "Email tidak ditemukan!");
        }
        return redirect('/verify-token');
    }

    public function resetPassword(Request $request)
    {
        try {
            $request->validate([
                'token'    => 'required|string',
                'password' => 'required|string|min:8',
            ]);

            if (!$this->auth->resetPassword($request->token, $request->password)) {
                return back()->with('fail_login', "Token salah!");
            }
            return redirect('/login')->with('login_berhasil', "Password berhasil diubah!");
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        $this->auth->logout();
        return redirect('/login');
    }



    public function update(Request $request)
    {
        try {
            $user = Auth::user();
            $validated = $request->validate([
                'nama' => 'required|string|max:100',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'current_password' => 'nullable|string',
                'new_password' => 'nullable|string|min:6',
            ]);
            $user->nama = $validated['nama'];
            $user->email = $validated['email'];
            if (!empty($validated['current_password']) && !empty($validated['new_password'])) {
                if (!Hash::check($validated['current_password'], $user->password)) {
                    return back()->with('fail_profile', 'Password saat ini salah.');
                }
                $user->password = Hash::make($validated['new_password']);
            }
            $user->save();
            if ($request->hasFile('profile_picture')) {
                $detail = $user->detail;

                if ($detail && $detail->foto) {
                    Storage::delete('public/' . $detail->foto);
                }
                $path = $request->file('profile_picture')->store('foto_user', 'public');
                if ($detail) {
                    $detail->foto = $path;
                    $detail->save();
                } else {
                    $user->detail()->create(['foto' => $path]);
                }
            }

            return back()->with('success_profile', 'Profil berhasil diperbarui.');
        } catch (\Exception $e) {
            return back()->with('fail_profile', 'Profil gagal diperbaharui' . $e->getMessage());
        }
    }
}
