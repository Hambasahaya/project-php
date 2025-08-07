<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lowongan_applys extends Model
{
    protected $fillable = [
        'perusahaan_id',
        'pelamar_id',
        'lowongan_id',
        'status_lamaran',
        'file_cv',
        'pelamar_deskripsi'
    ];

    public function pelamar()
    {
        return $this->belongsTo(User::class, 'pelamar_id');
    }
    public function perusahaan()
    {
        return $this->belongsTo(User::class, 'perusahaan_id');
    }

    public function lowongan()
    {
        return $this->belongsTo(lowongans::class, 'lowongan_id');
    }
}
