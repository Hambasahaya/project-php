<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthUsers extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        try {
            $user = User::create([
                'name' => $validated['nama'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                "level" => "admin"
            ]);
            if ($user) {
                Auth::login($user);
                return redirect()->to('/')->with('success', 'Registration successful!');
            }
        } catch (\Throwable $e) {
            // return back()->with('error', 'Failed to register user.');
            dd($e->getMessage());
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $user = User::where('email', $credentials['email'])->first();
        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            if ($user->level === "admin") {
                return redirect()->route('adminpages')->with('success', 'Login successful!');
            }
            return redirect()->to('/')->with('success', 'Login successful!');
        }
        return back()->with('error', 'Invalid credentials.');
    }

    public function resetPassword(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            $user = User::where('email', $validated['email'])->firstOrFail();

            $user->password = Hash::make($validated['password']);

            if ($user->save()) {
                return redirect()->route('login')->with('success', 'Password reset successful!');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to reset password.');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }
}
