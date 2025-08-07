<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pengalaman_kerjas extends Model
{


    protected $fillable = [
        'user_id',
        'nama_perusahaan',
        'jabatan',
        'deskripsi_pekerjaan',
        'tahun_masuk',
        'tahun_keluar',
        "skil",
        "tipe_perkerjaan"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
