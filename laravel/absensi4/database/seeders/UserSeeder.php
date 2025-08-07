<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $jumlahAkun = 1;

        for ($i = 0; $i < $jumlahAkun; $i++) {
            $password = "namasayaikan";
            $uuidSegment = substr(Str::uuid()->getHex(), 0, 6);
            $nim = 'adminsuper' . $uuidSegment;
            User::create([
                'nama'     => 'adminsuperr ' . ($i + 1),
                'email'    => 'adminsuperrr' . ($i + 1) . '@example.com',
                'nim'      => $nim,
                'password' => Hash::make($password),
                'role'     => 'admin',
            ]);
        }
    }
}
