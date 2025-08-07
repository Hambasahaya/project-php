<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $fillable = [
        'user_id',
        'kelas_id',
        'tanggal_absen',
        'waktu_masuk',
        'waktu_keluar',
        'keterangan',
        'status',
        'terlambat',
        'pertemuan'
    ];
}
