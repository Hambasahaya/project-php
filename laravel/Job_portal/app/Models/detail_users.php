<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detail_users extends Model
{
    protected $fillable = [
        'user_id',
        'file_cv',
        'alamat',
        'tanggal_lahir',
        'tempat_lahir',
        "noTlp",
        "website",
        'jenis_kelamin',
        'tingkat_pendidikan',
        'nama_instansi',
        'tahun_lulus',
        'nilai_akhir',
        "visi",
        "misi",
        "link_maps",
        'deskripsi_pribadi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
