<?php

namespace App\Exports;

use App\Models\Absen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class RekapAbsenExport implements FromCollection, WithHeadings, WithMapping, WithDrawings, WithEvents
{
    private $row = 2;
    private $mode;
    private $absens;

    /**
     * @param string 
     */
    public function __construct(string $mode = 'all')
    {
        $this->mode = $mode;
    }

    public function collection()
    {
        $query = Absen::with(['user.role', 'user.divisi', 'user.detail']);

        if ($this->mode === 'role') {
            $query->whereHas('user.role');
        } elseif ($this->mode === 'divisi') {
            $query->whereHas('user.divisi');
        }

        $this->absens = $query->get();
        return $this->absens;
    }

    public function headings(): array
    {
        return [
            "Nama",
            "Role",
            "Divisi",
            "Tanggal Absen",
            "Lokasi Absen",
            "Jam Absen",
            "Status Absen",
            "Bukti Foto Absen",
        ];
    }

    public function map($data): array
    {
        return [
            $data->user->nama ?? '-',
            $data->user->role->role_name ?? '-',
            $data->user->divisi->nama_divisi ?? '-',
            $data->tanggal,
            $data->lokasi_absen ?? '-',
            $data->jam_masuk ?? '-',
            $data->status ?? '-',
            '',
        ];
    }

    public function drawings()
    {
        $drawings = [];

        foreach ($this->absens as $index => $absen) {
            $foto = $absen->foto_absen;
            $path = public_path('storage/foto_absen/' . $foto);

            if (file_exists($path)) {
                $drawing = new Drawing();
                $drawing->setName('Foto Bukti Absen');
                $drawing->setPath($path);
                $drawing->setHeight(50);
                $drawing->setCoordinates('H' . ($index + $this->row));
                $drawing->setOffsetX(5);
                $drawing->setOffsetY(5);
                $drawings[] = $drawing;
            }
        }

        return $drawings;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $total = $this->absens->count();
                $startRow = $this->row;

                for ($i = 0; $i < $total; $i++) {
                    $rowNumber = $i + $startRow;
                    $event->sheet->getDelegate()->getRowDimension($rowNumber)->setRowHeight(60);
                }

                $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(14);
            },
        ];
    }
}
