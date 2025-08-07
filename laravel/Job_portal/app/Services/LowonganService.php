<?php

namespace App\Services;

use App\Models\lowongan_applys;
use App\Models\lowongans;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LowonganService
{
    protected $fileService;

    public function __construct()
    {
        $this->fileService = new FileService();
    }
    public function addNewLowongan(array $data): RedirectResponse
    {
        $validator = Validator::make($data, [
            'judul_lowongan' => 'required|string|max:255',
            'deskripsi_lowongan' => 'required|string',
            'kategori_lowongan' => 'required|array',
            'kualifikasi' => 'required|string',
            'gaji_minimum' => 'required|numeric',
            'gaji_maximum' => 'required|numeric',
            "tipe_pekerjaan" => 'required',
        ]);
        if ($validator->fails()) {
            dd($validator->errors());
        }

        try {
            $lowongan = new lowongans();
            $lowongan->fill($validator->validated());
            $lowongan->user_id = Auth::user()->id;
            $lowongan->status_lowongan = "aktif";
            $lowongan->lokasi = $data["provinsi"] . "," . $data["kota"];
            $lowongan->save();

            return Redirect::back()->with('success_lowongan', 'Lowongan berhasil ditambahkan.');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function updateLowongan(int $id, array $data): RedirectResponse
    {
        $validator = Validator::make($data, [
            'judul_lowongan' => 'sometimes|required|string|max:255',
            'deskripsi_lowongan' => 'sometimes|required|string',
            'status_lowongan' => 'sometimes|required|in:aktif,nonaktif',
            'kategori_lowongan' => 'sometimes|required|array',
            'kualifikasi' => 'sometimes|required|string',
            'lokasi' => 'sometimes|required|string',
            'gaji_minimum' => 'sometimes|required|numeric',
            'gaji_maximum' => 'sometimes|required|numeric',
            "tipe_pekerjaan" => 'sometimes|required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        try {
            $lowongan = lowongans::findOrFail($id);
            $lowongan->fill($validator->validated());
            $lowongan->save();

            return Redirect::back()->with('success', 'Lowongan berhasil diperbarui.');
        } catch (\Exception $e) {
            return Redirect::back()->withErrors(['error' => 'Gagal memperbarui lowongan: ' . $e->getMessage()]);
        }
    }

    public function updateStatusLowongan(int $id, string $status): RedirectResponse
    {
        if (!in_array($status, ['aktif', 'nonaktif'])) {
            return Redirect::back()->withErrors(['error' => 'Status tidak valid']);
        }

        try {
            $lowongan = lowongans::findOrFail($id);
            $lowongan->status_lowongan = $status;
            $lowongan->save();

            return Redirect::back()->with('success', 'Status lowongan berhasil diubah.');
        } catch (\Exception $e) {
            return Redirect::back()->withErrors(['error' => 'Gagal mengubah status lowongan: ' . $e->getMessage()]);
        }
    }
    public static function getAllLowongan()
    {
        try {
            return lowongans::with('perusahaan')->get();
        } catch (\Exception $e) {
            return Redirect::back()->withErrors(['error' => 'Gagal mengambil data lowongan: ' . $e->getMessage()]);
        }
    }

    public static function getAllLowonganByUserId(int $userId)
    {
        try {
            return lowongans::where('user_id', $userId)->with('perusahaan')->get();
        } catch (\Exception $e) {
            return Redirect::back()->withErrors(['error' => 'Gagal mengambil lowongan perusahaan: ' . $e->getMessage()]);
        }
    }

    public static function getLowonganById(int $id)
    {
        try {
            return lowongans::with('perusahaan')->findOrFail($id);
        } catch (\Exception $e) {
            return Redirect::back()->withErrors(['error' => 'Lowongan tidak ditemukan: ' . $e->getMessage()]);
        }
    }

    public function applyLowongan(array $data): RedirectResponse
    {
        $validator = Validator::make($data, [
            'perusahaan_id'      => 'required',
            'lowongan_id'        => 'required|exists:lowongans,id',
            'file_cv'            => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'pelamar_deskripsi'  => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        try {
            $filePath = null;

            if (isset($data['file_cv']) && $data['file_cv']->isValid()) {
                $filePath = FileService::upload($data['file_cv'], 'file_cv');
            } else {
                $filePath = Auth::user()->detailUser->file_cv ?? null;
            }

            if (!$filePath) {
                return Redirect::back()->with(['gagal_lowongan' => 'CV tidak tersedia. Silakan upload CV.']);
            }
            $apply = new lowongan_applys();
            $apply->perusahaan_id     = $data['perusahaan_id'];
            $apply->pelamar_id        = Auth::user()->id;
            $apply->lowongan_id       = $data['lowongan_id'];
            $apply->file_cv           = $filePath;
            $apply->pelamar_deskripsi = $data['pelamar_deskripsi'] ?? null;
            $apply->save();

            return Redirect::back()->with('success_lowongan', 'Berhasil melamar pekerjaan.');
        } catch (\Exception $e) {
            return Redirect::back()->withErrors(['error' => 'Gagal melamar: ' . $e->getMessage()]);
        }
    }


    public function updateStatusLamaran(int $id, string $status): RedirectResponse
    {
        $validStatus = ['pending', 'diterima', 'ditolak'];
        if (!in_array($status, $validStatus)) {
            return Redirect::back()->withErrors(['error' => 'Status tidak valid.']);
        }

        try {
            $lamaran = lowongan_applys::findOrFail($id);
            $lamaran->status_lamaran = $status;
            $lamaran->save();

            return Redirect::back()->with('success', 'Status lamaran berhasil diubah.');
        } catch (\Exception $e) {
            return Redirect::back()->withErrors(['error' => 'Gagal mengubah status lamaran: ' . $e->getMessage()]);
        }
    }

    public function getAllPelamarByPerusahaanId(int $perusahaanId): RedirectResponse
    {
        try {
            $pelamar = lowongan_applys::where('perusahaan_id', $perusahaanId)
                ->with(['pelamar', 'lowongan'])
                ->get();

            session(['pelamar_by_perusahaan' => $pelamar]);
            return Redirect::back();
        } catch (\Exception $e) {
            return Redirect::back()->withErrors(['error' => 'Gagal mengambil daftar pelamar: ' . $e->getMessage()]);
        }
    }
    public function getPelamarById(int $lowoganId)
    {
        try {
            return lowongan_applys::where('lowongan_id', $lowoganId)->where('pelamar_id', Auth::user()->id)->first();
        } catch (\Exception $e) {
            return Redirect::back()->withErrors(['error' => 'Gagal mengambil daftar pelamar: ' . $e->getMessage()]);
        }
    }
    public function getApplyLowonganByPelamarId()
    {
        try {
            return lowongan_applys::where("pelamar_id", Auth::user()->id)->get();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
