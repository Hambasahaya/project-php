<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register()
    {
        $data = [
            'title' => 'Register'
        ];
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.register', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    public function login()
    {
        $data = [
            'title' => 'Login Page',
        ];
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login', $data);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'email or password is wrong',])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with(['logout' => 'You have logged out successfully!']);
    }

    public function update(Request $request)
    {
        $request->validate([
            'avatar'    => 'image|mimes:jpeg,jpg,png|max:3048',
            'name' => 'required',
            'email' => 'required',
            'password' => 'confirmed',
        ]);
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $image->storeAs('public/avatar', $image->hashName());
            if (auth()->user()->avatar != NULL) {
                Storage::delete('public/avatar/' . auth()->user()->avatar);
            }
            User::where('id', auth()->user()->id)->update([
                'avatar'     => $image->hashName(),
                'name'   => $request->name,
                'email'   => $request->email,
                'password'  => bcrypt($request->password),
            ]);
        } else {
            User::where('id', auth()->user()->id)->update([
                'name'   => $request->name,
                'email'   => $request->email,
                'password'  => bcrypt($request->password),
            ]);
        }
        return redirect()->route('profile')->with(['updated' => 'Updated profile successfully!']);
    }
}
