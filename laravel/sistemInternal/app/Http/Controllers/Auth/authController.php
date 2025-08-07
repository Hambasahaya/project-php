<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthServices\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class authController extends Controller
{
    public function login(Request $request)
    {
        return AuthService::login($request->only('email', 'password'));
    }
    public function verifEmail(Request $request)
    {
        $email = AuthService::Emailchek($request->email);
        if ($email['success'] === true) {
            session(['email_verif' => $email['email_verif']]);
            return redirect()->route('resetpassword');
        }
        return redirect()->back()->with(['login_error' => 'Email tidak ditemukan atau tidak valid.']);
    }
    public function resetpassword(Request $request)
    {
        if (!session()->has('email_verif')) {
            return redirect()->route('login')->withErrors(['email' => 'Session tidak valid.']);
        }
        return AuthService::resetPassword(session('email_verif'), $request->password);
    }
    public static function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
