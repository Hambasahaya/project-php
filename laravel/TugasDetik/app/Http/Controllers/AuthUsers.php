<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AuthUsers extends Controller
{
    const ROLE_ADMIN = 'Admin';
    const ROLE_USER = 'User';

    public function login(Request $request)
    {
        $validate = $request->validate([
            "Username" => "required|email:rfc,dns",
            "password" => "required|min:6"
        ]);
        $user = User::where('username', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();
            switch (Auth::user()->Role) {
                case self::ROLE_USER:
                    return redirect()->intended(route('/'))->with('berhasil_login', 'Pesan berhasil login');
                case self::ROLE_ADMIN:
                    return redirect()->intended(route('adminpages'));
                default:
                    Auth::logout();
                    return redirect()->route('login')->withErrors(['role' => 'Role tidak dikenali.']);
            }
        }
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }
    public function Register(Request $request)
    {
        $validate = $request->validate([
            "username" => "required|min:5",
            "nama_lengkap" => "required|min:5",
            "password" => ['required', Password::min(8)->letters()->mixedCase()->numbers()],
            "email" => "required|email:rfc,dns|unique:users",
        ]);
        $validate["Role"] = self::ROLE_USER;
        $validate["foto"] = "User.svg";
        $validate["password"] = Hash::make($request->password);
        $user = User::create($validate);
        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended(route('/'));
        }
        return back()->withErrors([
            'register' => 'Registrasi gagal, sepertinya ada yang salah.',
        ]);
    }
    public function uploadimg(Request $request, $imgdeflaut = 'default.svg')
    {
        if ($request->hasFile('foto')) {
            try {
                $file = $request->file('foto');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('/asset/img/userfoto');
                $file->move($destinationPath, $filename);
                return $filename;
            } catch (\Exception $e) {
                return $imgdeflaut;
            }
        }
        return $imgdeflaut;
    }
    // public function Upduser(Request $request)
    // {
    //     $validate = $request->validate([
    //         "nama_lengkap" => "sometimes|required|min:5",
    //         "No_hp" => "sometimes|required|min:12",
    //         "nik" => "sometimes|required|min:16",
    //         "tanggal_lahir" => "sometimes|required|date",
    //         "password" => ['sometimes',  Password::min(8)->letters()->mixedCase()->numbers()],
    //         "jenis_kelamin" => "sometimes|required",
    //         "email" => "sometimes|required|email:rfc,dns|unique:users,email," . $request->id_user,
    //         "foto" => "sometimes|image|mimes:jpg,png,jpeg|",
    //         "role" => "required"
    //     ]);

    //     if (isset($validate['password'])) {
    //         $validate["password"] = Hash::make($request->password);
    //     }

    //     $user = User::find($request->id_user);
    //     if ($user) {
    //         $validate["foto"] = $this->uploadimg($request);
    //         if ($user->update($validate)) {
    //             return true;
    //         }
    //     }
    //     return false;
    // }


    public function Cekusername(Request $request)
    {
        $user = User::where("email", $request->email)->first();
        if ($user) {
            return back()->with("email_found", "username Anda ditemukan.");
        } else {
            return back()->with("email_not_found", "username tidak ditemukan.");
        }
    }
    public function newpass(Request $request)
    {
        $validate = $request->validate([
            "password" => ['required', Password::min(8)->letters()->mixedCase()->numbers()]
        ]);
        $email = session('email');
        $user = User::where("email", $email)->first();
        if ($user) {
            $user->password = Hash::make($validate["password"]);
            if ($user->save()) {
                $request->session()->forget("email");
                return back()->with("berhasil_ubah", "Password berhasil diubah.");
            } else {
                return back()->with("gagal_ubah", "Gagal mengubah password.");
            }
        } else {
            return back()->with("gagal_ubah", "User tidak ditemukan.");
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->to('/');
    }
}
