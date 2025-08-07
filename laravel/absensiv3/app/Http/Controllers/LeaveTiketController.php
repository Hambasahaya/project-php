<?php

namespace App\Http\Controllers;

use App\Models\absens;
use App\Models\leave_tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuans = Auth::user()->role === 'HR'
            ? leave_tiket::with('user')->latest()->get()
            : leave_tiket::where('user_id', Auth::id())->latest()->get();

        return response()->json($pengajuans);
    }

    public function addPengajuan(Request $request)
    {
        $this->validatePengajuan($request);

        try {
            $pathBukti = $this->handleBuktiUpload($request);

            leave_tiket::create([
                'user_id' => Auth::id(),
                'jenis' => $request->jenis,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_selesai' => $request->tanggal_selesai,
                'alasan' => $request->alasan,
                'bukti' => $pathBukti,
                'status' => 'menunggu'
            ]);

            return back()->with('pengajuans_success', 'Pengajuan diproses');
        } catch (\Exception $e) {
            return back()->with('pengajuans_fail', $e->getMessage());
        }
    }

    public function approve($id)
    {
        $pengajuan = leave_tiket::findOrFail($id);

        if ($pengajuan->status !== 'menunggu') {
            return response()->json(['message' => 'Pengajuan sudah diproses.'], 400);
        }

        $pengajuan->update(['status' => 'disetujui']);
        $this->updateAbsensi($pengajuan);

        return response()->json(['message' => 'Pengajuan disetujui dan absensi diperbarui']);
    }


    public function reject($id)
    {
        $pengajuan = leave_tiket::findOrFail($id);

        if ($pengajuan->status !== 'menunggu') {
            return response()->json(['message' => 'Pengajuan sudah diproses.'], 400);
        }

        $pengajuan->update(['status' => 'ditolak']);

        return response()->json(['message' => 'Pengajuan ditolak']);
    }

    private function validatePengajuan(Request $request)
    {
        $request->validate([
            'jenis' => 'required|in:cuti,izin,sakit',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'nullable|string',
            'bukti' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);
    }


    private function handleBuktiUpload(Request $request)
    {
        if ($request->hasFile('bukti')) {
            return $request->file('bukti')->store('bukti_pengajuan', 'public');
        }
        return null;
    }

    private function updateAbsensi(leave_tiket $pengajuan)
    {
        $mulai = Carbon::parse($pengajuan->tanggal_mulai);
        $selesai = Carbon::parse($pengajuan->tanggal_selesai);

        for ($tanggal = $mulai->copy(); $tanggal->lte($selesai); $tanggal->addDay()) {
            absens::updateOrCreate(
                ['user_id' => $pengajuan->user_id, 'tanggal' => $tanggal->format('Y-m-d')],
                ['status' => $pengajuan->jenis]
            );
        }
    }
}
