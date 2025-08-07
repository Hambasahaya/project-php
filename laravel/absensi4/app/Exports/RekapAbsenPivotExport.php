<?php

namespace App\Exports;

use App\Models\Kelas;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RekapAbsenPivotExport implements FromCollection, WithHeadings
{
    protected $kelas;

    public function __construct(Kelas $kelas)
    {
        $this->kelas = $kelas;
    }

    public function collection(): Collection
    {
        $mahasiswa = $this->kelas->mahasiswa;
        $absens = $this->kelas->kehadiran()->get();

        $data = [];

        foreach ($mahasiswa as $mhs) {
            $row = [
                'nama' => $mhs->nama,
                'nim' => $mhs->nim,
            ];

            for ($i = 1; $i <= 15; $i++) {
                $absen = $absens->where('user_id', $mhs->id)->where('pertemuan', $i)->first();
                $row['pertemuan_' . $i] = $absen ? $absen->status . '' . $absen->keterangan : '-';
            }

            $data[] = $row;
        }

        return collect($data);
    }

    public function headings(): array
    {
        $headings = ['Nama', 'NIM'];
        for ($i = 1; $i <= 15; $i++) {
            $headings[] = 'Pertemuan ' . $i;
        }
        return $headings;
    }
}
