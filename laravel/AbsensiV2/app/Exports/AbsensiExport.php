<?php

namespace App\Exports;

use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AbsensiExport implements FromView
{
    protected $range, $userId;

    public function __construct($range, $userId = null)
    {
        $this->range = $range;
        $this->userId = $userId;
    }

    public function view(): View
    {
        $query = Absensi::with('user');

        if ($this->userId) {
            $query->where('user_id', $this->userId);
        } else {
            $query->whereHas('user', fn($q) => $q->where('role', 'Staff'));
        }

        if ($this->range === 'minggu') {
            $query->whereBetween('tanggal_absen', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        } elseif ($this->range === 'bulan') {
            $query->whereBetween('tanggal_absen', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]);
        } elseif ($this->range === 'tahun') {
            $query->whereBetween('tanggal_absen', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()]);
        }

        return view('exports.absensi', [
            'absens' => $query->get()
        ]);
    }
}
