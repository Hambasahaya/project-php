<?php

namespace App\Http\Controllers;

use App\Models\Absen as ModelsAbsen;
use App\Services\AbsenServices\AbesenService;
use Illuminate\Http\Request;
use App\Exports\RekapAbsenExport;
use Maatwebsite\Excel\Facades\Excel;

class Absen extends Controller
{
    public function Absen(Request $request)
    {
        return AbesenService::absen($request->all());
    }
    public function getstatusabsenbyid($id)
    {
        $absen = ModelsAbsen::select('id', 'status')
            ->where('id', $id)
            ->first();

        if (!$absen) {
            return response()->json(['success' => false, 'message' => 'data absen tidak ditemukan.'], 404);
        }

        return response()->json(['success' => true, 'data' => $absen], 200);
    }
    public function UpdateStatusAbsen(Request $request, $id)
    {
        $status = $request->validate([
            "status" => 'required|string|in:hadir,izin,sakit,alpa'
        ]);
        return AbesenService::UpdateStatusAbsen($id, $status["status"]);
    }
    public function exportAllAbsen()
    {
        return Excel::download(new RekapAbsenExport('all'), 'rekap-absen-semua.xlsx');
    }
}
