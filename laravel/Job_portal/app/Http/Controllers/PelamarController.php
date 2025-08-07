<?php

namespace App\Http\Controllers;

use App\Models\lowongans;
use App\Models\pengalaman_kerjas;
use App\Services\LowonganService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class PelamarController extends Controller
{
    protected $applyLowonganService;

    public function __construct(LowonganService $applyLowonganService)
    {
        $this->applyLowonganService = $applyLowonganService;
    }

    public function showAllLowongan(): RedirectResponse
    {
        try {
            $lowongans = lowongans::with('perusahaan')->get();
            session(['lowongans_all' => $lowongans]);
            return back();
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Gagal mengambil daftar lowongan: ' . $e->getMessage()]);
        }
    }
    public function applyLowongan(Request $request)
    {
        return $this->applyLowonganService->applyLowongan($request->all());
    }

    public function AddPengalaman(Request $request)
    {
        foreach ($request->jobs as $job) {
            pengalaman_kerjas::create([
                'nama_perusahaan' => $job['nama_perusahaan'],
                'jabatan' => $job['jabatan'],
                "user_id" => Auth::user()->id,
                'deskripsi_pekerjaan' => $job['deskripsi_pekerjaan'],
                'skil' => $job['skil'],
                'tahun_masuk' => $job['tahun_masuk'],
                'tahun_keluar' => $job['tahun_keluar'],
                'tipe_pekerjaan' => $job['tipe_pekerjaan'],
            ]);
        }

        return redirect()->back()->with('success_pengalaman', 'Pengalaman kerja berhasil disimpan.');
    }
    public function EditPengalaman(Request $request, $id)
    {
        try {
            $pengalaman = pengalaman_kerjas::find($id);
            $pengalaman->nama_perusahaan = $request->nama_perusahaan ?? $pengalaman->nama_perusahaan;
            $pengalaman->jabatan = $request->jabatan ?? $pengalaman->jabatan;
            $pengalaman->user_id = Auth::user()->id;
            $pengalaman->deskripsi_pekerjaan = $request->deskripsi_pekerjaan ?? $pengalaman->deskripsi_pekerjaan;
            $pengalaman->skil = $request->skil ?? $pengalaman->skil;
            $pengalaman->tahun_masuk = $request->tahun_masuk ?? $pengalaman->tahun_masuk;
            $pengalaman->tahun_keluar = $request->tahun_keluar ?? $pengalaman->tahun_keluar;
            $pengalaman->tipe_pekerjaan = $request->tipe_pekerjaan ?? $pengalaman->tipe_pekerjaan;
            $pengalaman->save();
            return redirect()->back()->with('success_pengalaman', 'Pengalaman kerja berhasil diperbarui.');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function DeletePengalaman($id)
    {
        try {
            $pengalaman = pengalaman_kerjas::find($id);
            $pengalaman->delete();
            return redirect()->back()->with('success_pengalaman', 'Pengalaman kerja berhasil Dihapus.');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function profilePelamar()
    {
        return view('Profil.Pelamar.profilPelamar', ["pengalamans" => pengalaman_kerjas::where('user_id', Auth::user()->id)->get(), "lamaran" => $this->applyLowonganService->getApplyLowonganByPelamarId()]);
    }

    public function cari(Request $request)
    {
        $query = lowongans::query();

        if ($request->filled('judul')) {
            $query->where('judul_lowongan', 'like', '%' . $request->judul . '%');
        }

        if ($request->filled('lokasi')) {
            $query->where('lokasi', 'like', '%' . $request->lokasi . '%');
        }

        $data = $query->with('perusahaan')->latest()->paginate(6);

        if ($request->ajax()) {
            $view = view('components.list-pekerjaan', compact('data'))->render();
            $pagination = $data->withQueryString()->links()->render();

            return response()->json([
                'view' => $view,
                'pagination' => $pagination,
            ]);
        }

        return view('lowongan.hasil-pencarian', compact('data'));
    }
}
