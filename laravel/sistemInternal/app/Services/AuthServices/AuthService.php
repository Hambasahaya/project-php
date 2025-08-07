<?php

namespace App\Services\AuthServices;

use App\Models\Division;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\Detail_users;
use Illuminate\Support\Facades\Validator;
use App\Mail\WelcomeEmployeeMail;
use App\Services\MailService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Services\FileService;
use Illuminate\Support\Facades\Request;

class AuthService
{
    public static function registerEmployee(array $data): RedirectResponse
    {
        try {
            $validator = Validator::make($data, [
                'nama'        => 'required|string|max:255',
                'email'       => 'required|email|unique:users,email',
                'division_id' => 'required|exists:divisions,id',
                'role_id'     => 'required|exists:roles,id',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->with('erorr_add_employee', "Periksa lagi inputan anda!");
            }

            $defaultPassword = 'employee' . rand();
            $user = User::create([
                'nama'        => $data['nama'],
                'email'       => $data['email'],
                'password'    => Hash::make($defaultPassword),
                'role_id'        => $data["role_id"],
                'division_id' => $data["division_id"],
            ]);
            self::sendWelcomeEmail($user, $defaultPassword);
            return redirect()->back()->with("success_add_employee", "Akun berhasil di buat Cek email!");
        } catch (\Exception $e) {
            return back()->withErrors([
                'erorr_add_employee' => $e->getMessage(),
            ])->withInput();
        }
        return redirect()->back()->withErrors([
            'erorr_add_employee' => 'terjadi keselahan',
        ])->withInput();
    }


    public static function login(array $credentials): RedirectResponse
    {
        $validator = Validator::make($credentials, [
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        if (Auth::attempt($validated)) {
            return redirect()->intended('dasboard');
        }
        return redirect()->back()->with([
            'login_error' => 'Email atau password salah.',
        ]);
    }


    public static function updateProfile($userId, array $data): RedirectResponse
    {
        $validator = Validator::make($data, [
            'nama'           => 'sometimes|string|max:255',
            'email'          => 'sometimes|email|unique:users,email,' . $userId,
            'division_id'    => 'required|exists:divisions,id',
            'role_id'        => 'required|exists:roles,id',
            'alamat_lengkap' => 'nullable|string|max:500',
            'no_hp'          => 'nullable|string|max:20',
            'tanggal_lahir'  => 'nullable|date',
            'jenis_kelamin'  => 'nullable|in:Laki-laki,Perempuan',
            'foto_profile'    => 'nullable|file|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('erorr_add_employee', 'periksa kembali inputan anda!');
        }

        $user = User::find($userId);
        if (!$user) {
            return redirect()->back()->with('erorr_add_employee', 'tidak ditemukan');
        }

        $updateData = [
            'nama'  => $data['nama'] ?? $user->nama,
            'email' => $data['email'] ?? $user->email,
            'role_id' => $data['role_id'] ?? $user->role_id,
            'division_id' => $data['division_id'] ?? $user->division_id,
        ];
        $user->update($updateData);

        $fotoProfilPath = null;
        $existingDetail = Detail_users::where('user_id', $user->id)->first();

        if (!empty($data['foto_profile'])) {
            if ($existingDetail && $existingDetail->foto_profil) {
                FileService::delete($existingDetail->foto_profil);
            }
            $fotoProfilPath = FileService::upload($data['foto_profile'], 'foto_profil');
        } elseif ($existingDetail && $existingDetail->foto_profil) {
            $fotoProfilPath = $existingDetail->foto_profil;
        } else {
            $fotoProfilPath = 'foto_profil.png';
        }
        $detailData = [
            'alamat_lengkap' => $data['alamat_lengkap'] ?? null,
            'no_hp'          => $data['no_hp'] ?? null,
            'tanggal_lahir'  => $data['tanggal_lahir'] ?? null,
            'jenis_kelamin'  => $data['jenis_kelamin'] ?? null,
            'foto_profil'    => $fotoProfilPath,
        ];

        $detail = Detail_users::where('user_id', $user->id)->first();

        if ($detail) {
            $detail->update(array_filter($detailData));
        } else {
            Detail_users::create(array_merge(['user_id' => $user->id], array_filter($detailData)));
        }

        return redirect()->back()->with("success_add_employee", "Berhasil Update!");
    }


    public static function Emailchek(string $email): array
    {
        $user = User::where('email', $email)->first();
        return $user ? ["email_verif" => $user->email, "success" => true] : ["email_verif" => null, "success" => false];
    }
    public static function resetPassword(string $email, string $newPassword): RedirectResponse
    {
        try {
            $user = User::where('email', $email)->first();

            if (!$user) {
                return redirect()->route('login')->with('login_error', 'Email tidak ditemukan.');
            }

            $updated = $user->update(['password' => Hash::make($newPassword)]);

            if ($updated) {
                session()->forget('email_verif');
                return redirect()->route('login')->with('login_success', 'Password berhasil direset.');
            }

            return redirect()->route('login')->with('login_error', 'Password gagal direset.');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('login_error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }



    protected static function sendWelcomeEmail(User $user, $plainPassword)
    {
        MailService::send($user->email, new WelcomeEmployeeMail($user,  $plainPassword));
    }

    public static function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
