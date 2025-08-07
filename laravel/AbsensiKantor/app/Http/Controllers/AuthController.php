<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use PhpParser\Node\Stmt\Return_;

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
        return back()->with([
            'login_gagal' => 'Email atau password salah.',
        ])->withInput();
    }


    public function register(Request $request)
    {
        try {
            $request->validate([
                'nama'  => 'required|string',
                'email' => 'required|email|unique:users,email',
            ]);

            $password = Str::random(8);
            $user = User::create([
                'nama'     => $request->nama,
                'email'    => $request->email,
                'password' => Hash::make($password),
                'level'     => 'staff',
                'foto' => "deflaut.png"
            ]);
            Mail::raw("Akun Anda berhasil dibuat. Berikut password Anda: {$password}", function ($message) use ($user) {
                $message->to($user->email)
                    ->subject('Akun HRIS Anda');
            });
            return back()->with('berhasil_register', "akun Staff" . $request->nama . "Berhasil Dibuat");
        } catch (\Exception $e) {
            return back()->with('gagal_register', "akun Staff" . $request->nama . "gagal dibuat,kesalahan:" . $e->getMessage());
        }
    }
    public function sendResetToken(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('login_gagal', "email anda tidak ditemukan!");
        }

        $token = Str::random(60);
        $user->reset_token = $token;
        $user->save();
        Mail::raw("Gunakan token berikut untuk reset password: {$token}", function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Reset Password HRIS');
        });

        return redirect()->to('/verif');
    }
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token'    => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('reset_token', $request->token)->first();
        if (!$user) {
            return back()->with('login_gagal', "token salah!");
        }
        $user->password = Hash::make($request->password);
        $user->reset_token = null;
        $user->save();

        return redirect()->to('/')->with('login_berhasil', "password anda berhasil di ubah!");
    }

    public static function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
