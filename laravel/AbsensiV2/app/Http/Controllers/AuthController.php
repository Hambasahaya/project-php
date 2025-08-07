<?php

namespace App\Http\Controllers;


use App\Services\AuthServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (AuthServices::attemptLogin($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('login_gagal', 'Email atau password salah.')->withInput();
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama'  => 'required|string',
            'email' => 'required|email|unique:users,email',
        ]);
        return AuthServices::register($request->only('nama', 'email'));
    }

    public function sendResetToken(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        if (!AuthServices::sendResetToken($request->email)) {
            return back()->with('login_gagal', "Email tidak ditemukan!");
        }

        return redirect()->to('/veriftoken');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token'    => 'required|string',
            'password' => 'required|string',
        ]);

        if (!AuthServices::resetPassword($request->token, $request->password)) {
            return back()->with('login_gagal', "Token salah!");
        }

        return redirect('/login')->with('login_berhasil', "Password berhasil diubah!");
    }

    public function logout()
    {
        AuthServices::logout();
        return redirect('/login');
    }
    public function verifFace(Request $request)
    {
        $request->validate([
            'face_descriptor' => 'required',
        ]);

        $inputDescriptor = $request->face_descriptor;
        $users = \App\Models\User::whereNotNull('face_descriptor')->get();
        foreach ($users as $user) {
            $stored = $user->face_descriptor;
            if ($stored && is_array($stored) && count($stored) === 128) {
                $distance = sqrt(collect($inputDescriptor)
                    ->zip($stored)
                    ->reduce(fn($sum, $pair) => $sum + pow($pair[0] - $pair[1], 2), 0));
                if ($distance < 0.6) {
                    return response()->json(['message' => "Wajah sudah terdaftar dengan nama Staff :    {$user->nama}"], 500);
                }
            }
        }

        return AuthServices::verifFace($request->only('face_descriptor'));
    }
}
