<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->withInput()->with('loginError', 'Email atau password salah.');
    }


    public function register(Request $request)
    {
        $request->validate([
            'nama'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        try {
            $password = Str::random(8);

            $user = User::create([
                'nama'     => $request->nama,
                'email'    => $request->email,
                'password' => Hash::make($password),
                'level'    => 'staff',
                'foto'     => 'default.png',
            ]);

            Mail::raw("Akun Anda berhasil dibuat.\nEmail: {$user->email}\nPassword: {$password}", function ($message) use ($user) {
                $message->to($user->email)->subject('Akun HRIS Anda');
            });

            return back()->with('registerSuccess', "Akun staff '{$user->nama}' berhasil dibuat.");
        } catch (\Exception $e) {
            return back()->with('registerError', "Gagal membuat akun staff '{$request->nama}': {$e->getMessage()}");
        }
    }
    public function sendResetToken(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('resetError', 'Email tidak ditemukan.');
        }

        $token = Str::random(60);
        $user->reset_token = $token;
        $user->save();

        Mail::raw("Gunakan token berikut untuk reset password Anda:\n\nToken: {$token}", function ($message) use ($user) {
            $message->to($user->email)->subject('Reset Password HRIS');
        });

        return redirect()->to('/verif')->with('tokenSent', 'Token reset telah dikirim ke email Anda.');
    }


    public function resetPassword(Request $request)
    {
        $request->validate([
            'token'    => 'required|string',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::where('reset_token', $request->token)->first();
        if (!$user) {
            return back()->with('resetError', 'Token tidak valid.');
        }

        $user->update([
            'password'     => Hash::make($request->password),
            'reset_token'  => null,
        ]);

        return redirect('/')->with('resetSuccess', 'Password Anda berhasil diubah.');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
