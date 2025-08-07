<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PengajuanController extends Controller
{
    public function addPengajuan(Request $request)
    {
        $request->validate([
            'jenis'           => 'required|in:cuti,izin,sakit',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan'          => 'nullable|string',
            'bukti'           => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);

        try {
            $pathBukti = $request->hasFile('bukti')
                ? $request->file('bukti')->store('bukti_pengajuan', 'public')
                : null;

            Pengajuan::create([
                'user_id'         => Auth::id(),
                'jenis'           => $request->jenis,
                'tanggal_mulai'   => $request->tanggal_mulai,
                'tanggal_selesai' => $request->tanggal_selesai,
                'alasan'          => $request->alasan,
                'bukti'           => $pathBukti,
                'status'          => 'menunggu',
            ]);

            return back()->with('pengajuans_success', 'Pengajuan berhasil diproses.');
        } catch (\Exception $e) {
            return back()->with('pengajuans_fail', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    public function approve($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        if ($pengajuan->status !== 'menunggu') {
            return response()->json(['message' => 'Pengajuan sudah diproses.'], 400);
        }

        $pengajuan->update(['status' => 'disetujui']);

        $this->updateAbsenForPengajuan($pengajuan);

        return response()->json(['message' => 'Pengajuan disetujui dan absensi diperbarui.']);
    }
    public function reject($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        if ($pengajuan->status !== 'menunggu') {
            return response()->json(['message' => 'Pengajuan sudah diproses.'], 400);
        }

        $pengajuan->update(['status' => 'ditolak']);

        return response()->json(['message' => 'Pengajuan ditolak.']);
    }


    private function updateAbsenForPengajuan(Pengajuan $pengajuan)
    {
        $mulai   = Carbon::parse($pengajuan->tanggal_mulai);
        $selesai = Carbon::parse($pengajuan->tanggal_selesai);

        while ($mulai->lte($selesai)) {
            Absen::updateOrCreate(
                ['user_id' => $pengajuan->user_id, 'tanggal' => $mulai->format('Y-m-d')],
                ['status' => $pengajuan->jenis]
            );
            $mulai->addDay();
        }
    }
}
