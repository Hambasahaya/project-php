<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserCreatedMail;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

class AuthServices
{
    public static function attemptLogin(array $credentials): bool
    {
        return Auth::attempt($credentials);
    }

    public static function register(array $data)
    {
        try {
            $password = Str::random(8);
            $user = User::create([
                'nama'     => $data['nama'],
                'email'    => $data['email'],
                'password' => Hash::make($password),
                'role'    => 'Staff',
            ]);
            Mail::to($user->email)->send(new UserCreatedMail($user, $password));
            return response()->json([
                'message' => "masuk mas"
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }


    public static function sendResetToken(string $email): bool
    {
        $user = User::where('email', $email)->first();
        if (!$user) return false;

        $token = Str::random(8);
        $user->reset_token = $token;
        $user->save();

        Mail::to($user->email)->send(new ResetPasswordMail($user, $token));
        return true;
    }

    public static function resetPassword(string $token, string $password): bool
    {
        $user = User::where('reset_token', $token)->first();
        if (!$user) return false;
        $user->password = Hash::make($password);
        $user->reset_token = null;
        $user->save();
        return true;
    }

    public static function logout(): void
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
    }

    public static function verifFace(array $data)
    {
        try {
            $user = User::find(Auth::user()->id);
            $user->face_descriptor = $data["face_descriptor"];
            $user->save();
            return response()->json([
                'message' => "masuk mas"
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
