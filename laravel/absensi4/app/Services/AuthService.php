<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\detail_user;
use Illuminate\Http\Request;

class AuthService
{
    public function login(array $credentials): bool
    {
        return Auth::attempt($credentials);
    }

    public function registerAccount(array $data)
    {
        try {
            $password = Str::random(8);
            $uuidSegment = substr(Str::uuid()->getHex(), 0, 6);
            $nim = '41522010' . $uuidSegment;
            $user = User::create([
                'nama'     => $data['nama'],
                'email'    => $data['email'],
                'nim'      => $nim,
                'password' => Hash::make($password),
                'role'     => $data["role"] ? $data["role"] : 'mahasiswa'
            ]);
            Mail::raw("Akun Anda berhasil dibuat.\nUsername: {$nim}\nPassword: {$password}", function ($message) use ($user) {
                $message->to($user->email)->subject('Akun Anda - SnapAbsen');
            });
            return back()->with('success_auth', "Akun berhasil dibuat");
        } catch (\Exception $e) {
            return back()->with('fail_auth', $e->getMessage());
        }
    }

    public function sendResetToken(string $email): bool
    {
        $user = User::where('email', $email)->first();
        if (!$user) return false;

        $token = Str::random(10);
        $user->reset_token = $token;
        $user->save();
        Mail::raw("Gunakan token berikut untuk reset password: {$token}", function ($message) use ($user) {
            $message->to($user->email)->subject('Reset Password SnapAbsen');
        });

        return true;
    }

    public function resetPassword(string $token, string $password): bool
    {
        $user = User::where('reset_token', $token)->first();
        if (!$user) return false;
        $user->password = Hash::make($password);
        $user->reset_token = null;
        $user->save();
        return true;
    }

    public function logout(): void
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
    }

    public function updateOrCreateDetail(Request $request, int $userId): void
    {
        $validated = $request->validate([
            'jurusan'             => 'nullable|string|max:100',
            'fakultas'            => 'nullable|string|max:100',
            'semester'            => 'nullable|integer',
            'nuptk'               => 'nullable|string|max:50',
            'alamat'              => 'nullable|string|max:255',
            'no_hp'               => 'nullable|string|max:20',
            'jenis_kelamin'       => 'nullable|in:Laki-laki,Perempuan',
            'pendidikan_terakhir' => 'nullable|string|max:100',
            'foto'                => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('foto_user', 'public');
            $validated['foto'] = $fotoPath;
        }

        detail_user::updateOrCreate(
            ['user_id' => $userId],
            $validated
        );
    }
}
