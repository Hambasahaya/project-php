<?php

namespace App\Exports;

use App\Models\Absen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Illuminate\Support\Collection;

class AbsenExport implements FromCollection, WithHeadings, WithMapping, WithDrawings
{
    protected string $range;
    protected ?int $userId;
    protected Collection $data;

    public function __construct(string $range = 'minggu', ?int $userId = null)
    {
        $this->range = $range;
        $this->userId = $userId;
    }

    public function collection(): Collection
    {
        $query = Absen::with('user');

        $query->when($this->range === 'minggu', fn($q) => $q->where('tanggal', '>=', now()->subWeek()))
            ->when($this->range === 'bulan', fn($q) => $q->where('tanggal', '>=', now()->subMonth()))
            ->when($this->range === 'tahun', fn($q) => $q->where('tanggal', '>=', now()->subYear()));

        if ($this->userId) {
            $query->where('user_id', $this->userId);
        }

        return $this->data = $query->get();
    }

    public function map($absen): array
    {
        return [
            $absen->user->nama ?? '-',
            $absen->tanggal,
            $absen->jam_masuk,
            $absen->jam_pulang,
            $absen->status,
            '',
            '',
            $absen->lat_masuk,
            $absen->lon_masuk,
            $absen->lat_pulang,
            $absen->lon_pulang,
        ];
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Tanggal',
            'Jam Masuk',
            'Jam Pulang',
            'Status',
            'Foto Masuk',
            'Foto Pulang',
            'Latitude Masuk',
            'Longitude Masuk',
            'Latitude Pulang',
            'Longitude Pulang',
        ];
    }

    public function drawings(): array
    {
        $drawings = [];

        foreach ($this->data as $index => $absen) {
            $row = $index + 2;

            if ($path = $this->validPhotoPath($absen->foto_masuk)) {
                $drawings[] = $this->createDrawing($path, 'F' . $row);
            }

            if ($path = $this->validPhotoPath($absen->foto_pulang)) {
                $drawings[] = $this->createDrawing($path, 'G' . $row);
            }
        }

        return $drawings;
    }

    private function validPhotoPath(?string $photo): ?string
    {
        $fullPath = public_path($photo);
        return $photo && file_exists($fullPath) ? $fullPath : null;
    }

    private function createDrawing(string $path, string $cell): Drawing
    {
        $drawing = new Drawing();
        $drawing->setPath($path);
        $drawing->setHeight(50);
        $drawing->setCoordinates($cell);

        return $drawing;
    }
}
