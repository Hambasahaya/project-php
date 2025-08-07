<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Matakuliah;

class MatakuliahSeeder extends Seeder
{
    public function run(): void
    {
        $matakuliahList = [
            ['nama_matakuliah' => 'Pemrograman Web', 'semester' => 1],
            ['nama_matakuliah' => 'Struktur Data', 'semester' => 2],
            ['nama_matakuliah' => 'Basis Data', 'semester' => 2],
            ['nama_matakuliah' => 'Pemrograman Berorientasi Objek', 'semester' => 3],
            ['nama_matakuliah' => 'Kecerdasan Buatan', 'semester' => 5],
            ['nama_matakuliah' => 'Jaringan Komputer', 'semester' => 4],
            ['nama_matakuliah' => 'Sistem Operasi', 'semester' => 3],
            ['nama_matakuliah' => 'Rekayasa Perangkat Lunak', 'semester' => 5],
            ['nama_matakuliah' => 'Manajemen Proyek TI', 'semester' => 6],
        ];

        foreach ($matakuliahList as $item) {
            Matakuliah::create($item);
        }
    }
}
