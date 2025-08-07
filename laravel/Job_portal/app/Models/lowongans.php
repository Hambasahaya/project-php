<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lowongans extends Model
{

    protected $fillable = [
        'user_id',
        'judul_lowongan',
        'deskripsi_lowongan',
        'kualifikasi',
        'lokasi',
        'gaji_minimum',
        'gaji_maximum',
        "tipe_pekerjaan",
        'status_lowongan',
        "kategori_lowongan",
    ];

    protected $casts = [
        'kategori_lowongan' => 'array'
    ];
    public function perusahaan()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lowongan()
    {
        return $this->hasMany(lowongan_applys::class, 'lowongan_id');
    }
}
