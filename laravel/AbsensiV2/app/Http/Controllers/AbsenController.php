<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Services\AbsenService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Exports\AbsensiExport;
use Maatwebsite\Excel\Facades\Excel;

class AbsenController extends Controller
{
    public function absen(Request $request, AbsenService $absenService)
    {
        $request->validate([
            'type' => 'required|in:masuk,pulang',
            'face_descriptor' => 'required|array|size:128',
            'face_descriptor.*' => 'numeric',
        ]);

        return $absenService->absen($request->all());
    }



    public function filter(Request $request)
    {
        try {
            $filter = $request->input('filter', 'minggu');
            $query = Absensi::with('user')->where('user_id', Auth::id());
            if ($filter === 'minggu') {
                $query->whereBetween('tanggal_absen', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            } elseif ($filter === 'bulan') {
                $query->whereBetween('tanggal_absen', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]);
            } elseif ($filter === 'tahun') {
                $query->whereBetween('tanggal_absen', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()]);
            }

            $data = $query->orderByDesc('tanggal_absen')->get();

            $html = view('components.tables_absens', compact('data'))->render();
            return response()->json(['html' => $html]);
        } catch (\Exception $e) {
            return response()->json([
                "message" => $e->getMessage()
            ], 500);
        }
    }



    public function filterAll(Request $request)
    {
        try {
            $filter = $request->input('filter', 'minggu');
            $query = Absensi::with('user')->whereHas('user', function ($q) {
                $q->where('role', 'Staff');
            });

            if ($filter === 'minggu') {
                $query->whereBetween('tanggal_absen', [
                    Carbon::now()->startOfWeek(),
                    Carbon::now()->endOfWeek()
                ]);
            } elseif ($filter === 'bulan') {
                $query->whereBetween('tanggal_absen', [
                    Carbon::now()->startOfMonth(),
                    Carbon::now()->endOfMonth()
                ]);
            } elseif ($filter === 'tahun') {
                $query->whereBetween('tanggal_absen', [
                    Carbon::now()->startOfYear(),
                    Carbon::now()->endOfYear()
                ]);
            }

            $dataall = $query->orderByDesc('tanggal_absen')->get();
            $html = view('components.tables_absens_all', compact('dataall'))->render();
            return response()->json(['html' => $html]);
        } catch (\Exception $e) {
            return response()->json([
                "message" => $e->getMessage()
            ], 500);
        }
    }




    public function exportRekap(Request $request)
    {
        $range = $request->input('range', 'minggu');
        $userId = $request->input('user_id');

        return Excel::download(new AbsensiExport($range, $userId), 'rekap_absensi.xlsx');
    }
}
