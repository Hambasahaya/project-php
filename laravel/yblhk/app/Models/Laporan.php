<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomor_laporan',
        'id_users',
        'kategori_laporan',
        'tanggal_laporan',
        'deskripsi_laporan',
        'bukti_laporan',
        'statusLaporan',
        'tanggal_kejadian',
        'saksi',
        'lokasi_kejadian'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
    public function kategori()
    {
        return $this->belongsTo(Katgori_laporans::class, 'kategori_laporan');
    }
}
