<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\UsersModel;

class LoginContoller extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'g-recaptcha-response' => 'required|captcha',
        ]);
        $user = UsersModel::where('email', $credentials['email'])->first();
        if ($user) {
            if (Hash::check($credentials['password'], $user->password)) {
                Auth::login($user);
                $request->session()->regenerate();
                $request->session()->put('user_id', $user->id_users);
                $request->session()->put('user_email', $user->email);
                $request->session()->put('nama', $user->Nama_lengkap);
                $request->session()->put('foto', $user->Foto);
                if ($user->level === 2) {
                    return redirect()->intended('/');
                } else {
                    return redirect()->intended('/admin');
                }
            } else {
                return redirect()->back()->with([
                    'error' => 'Password atau email anda salah',
                ])->onlyInput('email');
            }
        } else {
            return redirect()->back()->with([
                'error' => 'Password atau email anda salah',
            ])->onlyInput('email');
        }
    }
    public function register(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|email:rfc,dns|unique:users,email',
            'Nama_lengkap' => 'required|min:3',
            'password' => 'required|min:6|max:16',
            'phone' => 'required|min:12|max:13',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $validated["jk"] = 1;
        $validated["Foto"] = "https://t3.ftcdn.net/jpg/05/53/79/60/360_F_553796090_XHrE6R9jwmBJUMo9HKl41hyHJ5gqt9oz.jpg";
        $validated["level"] = 2;
        $user = UsersModel::create($validated);
        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();
            $request->session()->put('user_id', $user->id_users);
            $request->session()->put('user_email', $user->email);
            $request->session()->put('nama', $user->Nama_lengkap);
            $request->session()->put('foto', $user->Foto);
            return redirect()->intended('/');
        } else {
            return redirect()->back();
        }
    }
    public function changepassword(Request $request)
    {
        $data = UsersModel::where("email", $request->email)->first();
        if ($data) {
            $data->password = bcrypt($request->newPassword);
            $data->save();
            return response()->json(['message' => 'berhasil merubah password'], 200);
        } else {
            return response()->json(['message' => 'gagal!'], 500);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
    public function Userupdate(Request $request)
    {
        $data = UsersModel::where("id_users", session("user_id"))->first();
        $data->email = $request->email;
        $data->Nama_lengkap = $request->nama;
        $data->jk = $request->jk;
        $data->phone = $request->nophone;

        $foto = $request->file('foto');
        $nama_foto = time() . '.' . $foto->extension();
        $path = $foto->move(public_path('img/userImg'), $nama_foto);
        $data->Foto = $nama_foto;
        $data->save();
        return redirect()->back();
    }
}
