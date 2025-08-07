<?php

namespace App\Services;

use App\Models\Pengajuan;
use App\Models\Absen;
use App\Models\Absensi;
use App\Models\Leave_Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class LeaveService
{
    public function getPengajuans()
    {
        if (Auth::user()->role === 'HR') {
            return Leave_Ticket::with('user')->latest()->get();
        }

        return Leave_Ticket::where('user_id', Auth::id())->latest()->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_tickets' => 'required|in:cuti,izin,sakit',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'nullable|string',
            'bukti' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);

        $pathBukti = null;
        if ($request->hasFile('bukti')) {
            $pathBukti = $request->file('bukti')->store('bukti', 'public');
        }
        return Leave_Ticket::create([
            'user_id' => Auth::user()->id,
            'jenis_tickets' => $request->jenis_tickets,
            'start' => $request->start,
            'end' => $request->end,
            'alasan' => $request->alasan,
            'bukti' => $pathBukti,
            'status' => 'Waiting List'
        ]);
    }
    public function approve($id)
    {
        try {
            $pengajuan = Leave_Ticket::findOrFail($id);

            if ($pengajuan->status !== 'Waiting List') {
                return response()->json(['error' => 'Pengajuan sudah diproses.'], 400);
            }

            $pengajuan->status = 'Approve';
            $pengajuan->save();

            $mulai = Carbon::parse($pengajuan->start);
            $selesai = Carbon::parse($pengajuan->end);

            for ($tanggal_absen = $mulai->copy(); $tanggal_absen->lte($selesai); $tanggal_absen->addDay()) {
                if (in_array($tanggal_absen->dayOfWeek, [0, 6])) continue;

                Absensi::updateOrCreate(
                    [
                        'user_id' => $pengajuan->user_id,
                        'tanggal_absen' => $tanggal_absen->format('Y-m-d'),
                    ],
                    [
                        'status' => $pengajuan->jenis_tickets
                    ]
                );
            }

            return response()->json(['message' => 'Pengajuan disetujui dan absensi diperbarui']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }


    public function reject($id)
    {
        $pengajuan = Leave_Ticket::findOrFail($id);

        if ($pengajuan->status !== 'menunggu') {
            return ['error' => 'Pengajuan sudah diproses.'];
        }

        $pengajuan->status = 'ditolak';
        $pengajuan->save();

        return ['message' => 'Pengajuan ditolak'];
    }
}
