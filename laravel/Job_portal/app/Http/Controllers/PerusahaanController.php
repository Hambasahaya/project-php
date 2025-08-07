<?php

namespace App\Http\Controllers;

use App\Models\lowongan_applys;
use App\Models\User;
use App\Services\LowonganService;
use App\Services\ApplyLowonganService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PerusahaanController extends Controller
{
    protected $lowonganService;

    public function __construct(LowonganService $lowonganService)
    {
        $this->lowonganService = $lowonganService;
    }
    public function addNewLowongan(Request $request): RedirectResponse
    {
        return $this->lowonganService->addNewLowongan($request->all());
    }
    public function updateLowongan(Request $request, int $id): RedirectResponse
    {
        return $this->lowonganService->updateLowongan($id, $request->all());
    }

    public function updateStatusLowongan(Request $request, int $id): RedirectResponse
    {
        return $this->lowonganService->updateStatusLowongan($id, $request->input('status'));
    }

    public function showPelamarByIdLowongan(int $lowonganId): RedirectResponse
    {
        try {
            $pelamar = lowongan_applys::where('lowongan_id', $lowonganId)
                ->with(['pelamar'])
                ->get();

            session(['pelamar_by_lowongan' => $pelamar]);
            return back();
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Gagal mengambil data pelamar: ' . $e->getMessage()]);
        }
    }


    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:diterima,ditolak',
        ]);

        $lamaran = lowongan_applys::findOrFail($id);
        $lamaran->status_lamaran = $request->status;
        $lamaran->save();
        return response()->json(['success' => true, 'status' => $lamaran->status_lamaran]);
    }

    public function showLowonganByPerusahaanId($id)
    {
        $data = $this->lowonganService->getLowonganById($id);
        return view('Profil.Perusahaan.statusjob', ["data" => $data]);
    }

    public function showPerusahanByid($id)
    {
        return view('pages.perusahaanDetail', ["datapur" => User::with('detailUser')->find($id)]);
    }
}
