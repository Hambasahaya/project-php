<?php

namespace App\Http\Controllers;

use App\Models\Apoteker;
use App\Models\Detail_users;
use App\Models\Dokter;
use App\Models\Fasyankes;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\OTPNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AuthUsers extends Controller
{
    const ROLE_PASIENT = 'pasien';
    const ROLE_ADMIN_RS = 'admin_rumah_sakit';
    const ROLE_DOKTER = 'doctor';
    const ROLE_APOTEKER = 'apoteker';

    public function login(Request $request)
    {
        $validate = $request->validate([
            "email" => "required|email:rfc,dns",
            "password" => "required|min:6"
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();
            switch (Auth::user()->role) {
                case self::ROLE_PASIENT:
                    return redirect()->intended(route('user'))->with('berhasil_login', 'Pesan berhasil login');
                case self::ROLE_ADMIN_RS:
                    return redirect()->intended(route('adminpages'));
                case self::ROLE_DOKTER:
                    return redirect()->intended(route('dokterpages'));
                case self::ROLE_APOTEKER:
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


    public function pasientRegister(Request $request)
    {
        $validate = $request->validate([
            "nama_lengkap" => "required|min:5",
            "No_hp" => "required|min:12",
            "nik" => "required|min:16",
            "tanggal_lahir" => "required|date",
            "password" => ['required', Password::min(8)->letters()->mixedCase()->numbers()],
            "jenis_kelamin" => "required",
            "email" => "required|email:rfc,dns|unique:users",
        ]);

        $validate["role"] = self::ROLE_PASIENT;
        $validate["foto"] = "pasient.svg";
        $validate["password"] = Hash::make($request->password);

        $pasient = User::create($validate);

        if ($pasient) {
            Auth::login($pasient);
            $request->session()->regenerate();
            return redirect()->intended(route('user'));
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


    public function AdminRegister(Request $request)
    {
        $validate = $request->validate([
            "alamat_fasyankes" => "required|min:12",
            "No_sip_dokter" => "required|min:16",
            "Kategori_Fasyankes" => "required",
            "status_Fasyankes" => "required",
            "nama_lengkap" => "required|min:5",
            "No_hp" => "required|min:12",
            "nik" => "required|min:16",
            "tanggal_lahir" => "required|date",
            "password" => ['required', Password::min(8)->letters()->mixedCase()->numbers()],
            "email" => "required|email:rfc,dns|unique:users,email",
        ]);
        $validate["role"] = self::ROLE_ADMIN_RS;
        $validate["foto"] = "rs.svg";
        $validate["password"] = Hash::make($request->password);
        $admin = User::create($validate);
        if ($admin) {
            $validate["id_users"] = $admin->id;
            $fasyankes = Fasyankes::create($validate);
            if ($fasyankes) {
                Auth::login($admin);
                $request->session()->regenerate();
                return redirect()->intended(route('adminpages'));
            }
        }
        return back()->withErrors([
            'register' => 'Registrasi gagal, sepertinya ada yang salah.',
        ]);
    }
    public function Adddokter(Request $request)
    {
        $validate = $request->validate([
            "nama_lengkap" => "required|min:5",
            "No_hp" => "required|min:12",
            "no_SIP" => "required|min:12",
            "nik" => "required|min:16",
            "tanggal_lahir" => "required|date",
            "password" => ['required', Password::min(8)->letters()->mixedCase()->numbers()],
            "jenis_kelamin" => "required",
            "email" => "required|email:rfc,dns|unique:users,email," . ($request->id ?? 'NULL') . ",id",
            "id_spesialis" => "required",
            "id_fasyankes" => "required",
            "alamat_lengkap" => "required",
            "Status_dokter" => "required",
            "foto" => "sometimes|image|mimes:jpg,png,jpeg|max:2048",
        ]);

        $validate["role"] = self::ROLE_DOKTER;
        if (!empty($request->password)) {
            $validate["password"] = Hash::make($request->password);
        } else {
            unset($validate["password"]);
        }

        if ($request->hasFile('foto')) {
            $validate["foto"] = $this->uploadimg($request);
        } else {
            unset($validate["foto"]);
        }
        $dokter = User::create($validate);
        if ($dokter) {
            $validate["id_user"] = $dokter->id;
            $newdokter = Dokter::create($validate);
            if ($newdokter) {
                return redirect()->intended(route('admindokter'))->with('success_dokter', 'Dokter berhasil didaftarkan');
            }
        }
        return back()->withErrors('success_dokter', 'register dokter gagal, sepertinya ada yang salah.');
    }
    public function AddApoteker(Request $request)
    {
        $validate = $request->validate([
            "nama_lengkap" => "required|min:5",
            "No_hp" => "required|min:12",
            "no_SIPA" => "required|min:12",
            "nik" => "required|min:16",
            "tanggal_lahir" => "required|date",
            "password" => ['required', Password::min(8)->letters()->mixedCase()->numbers()],
            "jenis_kelamin" => "required",
            "email" => "required|email:rfc,dns|unique:users,email," . ($request->id ?? 'NULL') . ",id",
            "id_rumah_sakit" => "required",
            "alamat_lengkap" => "required",
            "Status_apoteker" => "required",
            "foto" => "sometimes|image|mimes:jpg,png,jpeg|max:2048",
        ]);

        $validate["role"] = self::ROLE_APOTEKER;

        if (!empty($request->password)) {
            $validate["password"] = Hash::make($request->password);
        } else {
            unset($validate["password"]);
        }

        if ($request->hasFile('foto')) {
            $validate["foto"] = $this->uploadimg($request);
        } else {
            unset($validate["foto"]);
        }
        try {
            DB::beginTransaction();
            $user = User::create($validate);
            if ($user) {
                $validate["id_user"] = $user->id;
                $apoteker = Apoteker::create($validate);
                if ($apoteker) {
                    DB::commit();
                    return redirect()->route('adminapoteker')->with('sukses_addapoteker', 'Apoteker berhasil didaftarkan');
                }
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('gagal_addapoteker', 'Register apoteker gagal, sepertinya ada yang salah ');
        }
    }


    public function updateApoteker(Request $request)
    {
        $validate = $request->validate([
            "nama_lengkap" => "required|min:5",
            "No_hp" => "required|min:12",
            "no_SIPA" => "required|min:12",
            "nik" => "required|min:16",
            "tanggal_lahir" => "required|date",
            "password" => ['nullable', Password::min(8)->letters()->mixedCase()->numbers()],
            "jenis_kelamin" => "required",
            "email" => "required|email:rfc,dns|unique:users,email," . $request->id,
            "id_rumah_sakit" => "required",
            "alamat_lengkap" => "required",
            "Status_apoteker" => "required",
            "foto" => "sometimes|image|mimes:jpg,png,jpeg|max:2048",
        ]);

        $user = User::findOrFail($request->id);

        if (!empty($request->password)) {
            $validate["password"] = Hash::make($request->password);
        } else {
            unset($validate["password"]);
        }

        if ($request->hasFile('foto')) {
            $validate["foto"] = $this->uploadimg($request);
        } else {
            unset($validate["foto"]);
        }

        try {
            DB::beginTransaction();
            $userUpdated = $user->update($validate);
            if ($userUpdated) {
                $apoteker = Apoteker::where('id_user', $request->id)->firstOrFail();
                $apotekerUpdated = $apoteker->update($validate);
                if ($apotekerUpdated) {
                    DB::commit();
                    return redirect()->route('adminapoteker')->with('sukses_addapoteker', 'Apoteker berhasil diupdate');
                }
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Update apoteker gagal: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return back()->with('gagal_addapoteker', ' ' . $e->getMessage());
        }
    }


    public function Upduser(Request $request)
    {
        $validate = $request->validate([
            "nama_lengkap" => "sometimes|required|min:5",
            "No_hp" => "sometimes|required|min:12",
            "nik" => "sometimes|required|min:16",
            "tanggal_lahir" => "sometimes|required|date",
            "password" => ['sometimes',  Password::min(8)->letters()->mixedCase()->numbers()],
            "jenis_kelamin" => "sometimes|required",
            "email" => "sometimes|required|email:rfc,dns|unique:users,email," . $request->id_user,
            "foto" => "sometimes|image|mimes:jpg,png,jpeg|",
            "role" => "required"
        ]);

        if (isset($validate['password'])) {
            $validate["password"] = Hash::make($request->password);
        }

        $user = User::find($request->id_user);
        if ($user) {
            $validate["foto"] = $this->uploadimg($request);
            if ($user->update($validate)) {
                return true;
            }
        }
        return false;
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->to('/');
    }
    private function sendVerificationCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $code = rand(100000, 999999);
        $request->session()->put('verification_code', $code);
        $request->session()->put('email', $request->email);

        $user = User::where('email', $request->email)->first();
        $user->notify(new OTPNotification($code));

        return redirect()->route('login', ['token' => Str::random(60)])
            ->with('status', 'Verification code sent to your email.');
    }

    public function Cekmail(Request $request)
    {
        $user = User::where("email", $request->email)->first();

        if ($user) {
            $this->sendVerificationCode($request, $user);
            return back()->with("email_found", "Email Anda ditemukan.");
        } else {
            return back()->with("email_not_found", "Email tidak ditemukan.");
        }
    }
    public function cekotp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
        ]);
        $kodeotp = session("verification_code");
        if ($kodeotp && $request->otp == $kodeotp) {
            $request->session()->forget("verification_code");
            return back()->with("trueotp", "Kode OTP Anda benar!");
        } else {

            return back()->with("falseotp", "Kode OTP Anda salah.");
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
}
