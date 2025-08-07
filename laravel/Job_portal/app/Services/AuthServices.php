<?php

namespace App\Services;

use App\Models\User;
use App\Models\detail_users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Services\FileService;
use Illuminate\Support\Facades\Mail;

use function Laravel\Prompts\error;

class AuthServices
{

    public static function register(array $data)
    {
        try {
            $validator = Validator::make($data, [
                'nama' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8|max:16',
                "confrmpassword" => "required|same:password",
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            $validated = $validator->validated();
            $role = 'pelamar';
            if (isset($data["perusahaan"])) {
                $role = "perusahaan";
            }
            $user = User::create([
                'nama' => $validated['nama'],
                'email' => $validated['email'],
                'password' => Hash::make($validated["password"]),
                'foto' => "deflaut_user.png",
                "role" => $role
            ]);
            Auth::login($user);
            return redirect()->to('/homefix');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error_add_employee' => $e->getMessage()])
                ->withInput();
        }
    }

    public static function login(array $credentials): RedirectResponse
    {
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt($validator->validated())) {
            if (Auth::user()->role === "perusahaan") {
                return redirect()->intended('/about-perusahaan');
            }
            return redirect()->intended('/profilPelamar');
        }

        return redirect()->back()->with('login_error', 'Email atau password salah.');
    }

    public static function updateProfile(array $data)
    {
        try {
            $validator = Validator::make($data, [
                'nama' => 'sometimes|string|max:255',
                'email' => 'sometimes|email|unique:users,email,' . Auth::user()->id,
                'alamat' => 'nullable|string',
                'tanggal_lahir' => 'nullable|date',
                'tempat_lahir' => 'nullable|string',
                'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'tingkat_pendidikan' => 'nullable|string',
                'nama_instansi' => 'nullable|string',
                'noTlp' => 'nullable|string',
                'visi' => 'nullable|string',
                'link_maps' => 'nullable|string',
                'misi' => 'nullable|string',
                'website' => 'nullable|string',
                'tahun_lulus' => 'nullable|date',
                'nilai_akhir' => 'nullable|numeric',
                'deskripsi_pribadi' => 'nullable|string',
                'file_cv' => 'nullable|file|extensions:pdf,doc,docx|max:2048',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('error_add_employee', 'Silakan periksa kembali inputan Anda!');
            }

            $validated = $validator->validated();
            $user = User::findOrFail(Auth::user()->id);
            $detailUser = Detail_users::where('user_id', Auth::user()->id)->firstOrNew();
            $user->fill([
                'nama' => $validated['nama'] ?? $user->nama,
                'email' => $validated['email'] ?? $user->email,
            ]);

            if (!empty($validated['foto'])) {
                if ($user->foto && file_exists(storage_path('app/public/foto_user' . $user->foto)) && $user->foto != 'deflaut_user.png') {
                    FileService::delete('app/public/foto_user' . $user->foto);
                }
                $user->foto = FileService::upload($validated['foto'], 'foto_user');
            }
            $user->save();
            $detailUser->fill([
                'tingkat_pendidikan' => $validated['tingkat_pendidikan'] ?? $detailUser->tingkat_pendidikan,
                'nama_instansi' => $validated['nama_instansi'] ?? $detailUser->nama_instansi,
                'tahun_lulus' => $validated['tahun_lulus'] ?? $detailUser->tahun_lulus,
                'nilai_akhir' => $validated['nilai_akhir'] ?? $detailUser->nilai_akhir,
                'deskripsi_pribadi' => $validated['deskripsi_pribadi'] ?? $detailUser->deskripsi_pribadi,
                'alamat' => $validated['alamat'] ?? $detailUser->alamat,
                'tanggal_lahir' => $validated['tanggal_lahir'] ?? $detailUser->tanggal_lahir,
                'tempat_lahir' => $validated['tempat_lahir'] ?? $detailUser->tempat_lahir,
                'jenis_kelamin' => $validated['jenis_kelamin'] ?? $detailUser->jenis_kelamin,
                'noTlp' => $validated['noTlp'] ?? $detailUser->noTlp,
                'website' => $validated['website'] ?? $detailUser->website,
                'visi' => $validated['visi'] ?? $detailUser->visi,
                'misi' => $validated['misi'] ?? $detailUser->misi,
                'link_maps' => $validated['link_maps'] ?? $detailUser->misi,
            ]);

            $detailUser->user_id = $user->id;
            if (!empty($validated['file_cv'])) {
                if ($detailUser->file_cv && file_exists(storage_path('app/public/file_cv' . $detailUser->file_cv))) {
                    FileService::delete('app/public/file_cv' . $detailUser->file_cv);
                }
                $detailUser->file_cv = FileService::upload($validated['file_cv'], 'file_cv');
            }
            $detailUser->save();
            return redirect()->back()->with('success_profile', 'Profil berhasil diperbarui!');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public static function resetPassword(string $email, string $newPassword): RedirectResponse
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->route('login')->with('login_error', 'Email tidak ditemukan.');
        }

        try {
            $user->password = Hash::make($newPassword);
            $user->save();

            Session::forget('email_verif');

            return redirect()->route('login')->with('login_success', 'Password berhasil direset.');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('login_error', 'Gagal mereset password: ' . $e->getMessage());
        }
    }
    public static function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect('/login');
    }
}
