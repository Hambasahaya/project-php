<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class RekapKaryawanExport implements FromCollection, WithHeadings, WithMapping, WithDrawings, WithEvents
{
    private $row = 2;
    private $mode;
    private $users;

    public function __construct(string $mode = 'merge')
    {
        $this->mode = $mode;
    }

    public function collection()
    {
        $query = User::with(['detail']);

        if ($this->mode === 'role') {
            $query->with('role');
        } elseif ($this->mode === 'divisi') {
            $query->with('divisi');
        } else { // merge
            $query->with(['role', 'divisi']);
        }

        $this->users = $query->get();

        return $this->users;
    }

    public function headings(): array
    {

        switch ($this->mode) {
            case 'role':
                return ['Nama', 'Foto', 'Role', 'Email', 'Alamat', 'Tanggal Lahair', 'No Telepon', 'Jenis Kelamin'];
            case 'divisi':
                return ['Nama', 'Foto', 'Divisi', 'Email', 'Alamat', 'Tanggal Lahair', 'No Telepon', 'Jenis Kelamin'];
            case 'merge':
            default:
                return ['Nama', 'Foto', 'Role', 'Divisi', 'Email', 'Tanggal Lahair', 'Alamat', 'No Telepon', 'Jenis Kelamin'];
        }
    }

    public function map($data): array
    {
        switch ($this->mode) {
            case 'role':
                return [
                    $data->nama,
                    '',
                    $data->role->role_name ?? '-',
                    $data->email,
                    $data->detail->first()->alamat_lengkap ?? 'Belum diisi',
                    $data->detail->first()->tanggal_lahir ?? 'Belum diisi',
                    $data->detail->first()->no_hp ?? 'Belum diisi',
                    $data->detail->first()->jenis_kelamin ?? 'Belum diisi',
                ];
            case 'divisi':
                return [
                    $data->nama,
                    '',
                    $data->divisi->nama_divisi ?? '-',
                    $data->email,
                    $data->detail->first()->alamat_lengkap ?? 'Belum diisi',
                    $data->detail->first()->tanggal_lahir ?? 'Belum diisi',
                    $data->detail->first()->no_hp ?? 'Belum diisi',
                    $data->detail->first()->jenis_kelamin ?? 'Belum diisi',
                ];
            case 'merge':
            default:
                return [
                    $data->nama,
                    '',
                    $data->role->role_name ?? '-',
                    $data->divisi->nama_divisi ?? '-',
                    $data->email,
                    $data->detail->first()->alamat_lengkap ?? 'Belum diisi',
                    $data->detail->first()->tanggal_lahir ?? 'Belum diisi',
                    $data->detail->first()->no_hp ?? 'Belum diisi',
                    $data->detail->first()->jenis_kelamin ?? 'Belum diisi',
                ];
        }
    }

    public function drawings()
    {
        $drawings = [];

        foreach ($this->users as $index => $user) {
            $foto = $user->detail->first()->foto_profil ?? 'foto_profil.png';
            $path = public_path('storage/foto_profil/' . $foto);

            if (file_exists($path)) {
                $drawing = new Drawing();
                $drawing->setName('Foto Profil');
                $drawing->setPath($path);
                $drawing->setHeight(50);
                $drawing->setCoordinates('B' . ($index + $this->row));
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
                $total = $this->users->count();
                $startRow = $this->row;

                for ($i = 0; $i < $total; $i++) {
                    $rowNumber = $i + $startRow;
                    $event->sheet->getDelegate()->getRowDimension($rowNumber)->setRowHeight(60);
                }

                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(14);
            },
        ];
    }
}
