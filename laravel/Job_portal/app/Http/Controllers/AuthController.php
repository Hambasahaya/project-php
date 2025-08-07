<?php

namespace App\Http\Controllers;

use App\Services\AuthServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\PasswordReset;
use App\Mail\ResetTokenMail;
use App\Models\PasswordResest;
use Illuminate\Support\Facades\Hash;

class AuthController
{
    public function Register(Request $request, AuthServices $auth)
    {
        return $auth::register($request->only('nama', 'email', "password", "confrmpassword", "perusahaan"));
    }
    public function Login(Request $request, AuthServices $auth)
    {
        return $auth::Login($request->only('email', "password"));
    }
    public function Updateprofile(Request $request, AuthServices $auth)
    {
        return $auth::updateProfile($request->all());
    }
    public function logout(AuthServices $auth)
    {
        return $auth::logout();
    }

    public function sendResetEmail(Request $request)
    {
        try {
            $request->validate(['email' => 'required|email']);

            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return back()->withErrors(['email' => 'Email tidak ditemukan.']);
            }

            $token = mt_rand(1000, 9999);

            PasswordResest::updateOrCreate(
                ['email' => $user->email],
                ['token' => $token, 'created_at' => now()]
            );

            Mail::to($user->email)->send(new ResetTokenMail($token));
            session(['reset_email' => $user->email]);
            return redirect()->to('/tokenadd');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    public function verifyKode(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required',
                'kode' => 'required|numeric',
            ]);
            $record = PasswordResest::where('email', $request->email)
                ->where('token', $request->kode)
                ->first();
            if (!$record) {
                return back()->withErrors(['kode' => 'Kode salah atau tidak ditemukan.']);
            }
            return redirect()->route('newpassword');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    public function updatepassword(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);
            $user = User::where('email', $request->email)->first();
            $user->password = Hash::make($request["password"]);
            $user->save();
            return redirect()->to('/login');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
