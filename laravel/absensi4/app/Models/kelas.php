<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_kelas',
        'mata_kuliah',
        'ruangan',
        'jam_mulai',
        'jam_selesai',
        'hari',
        'dosen_pengampu',
        'qrcode',
        "uuid"
    ];


    public function kehadiran()
    {
        return $this->hasMany(Absen::class, 'kelas_id');
    }


    public function mahasiswa()
    {
        return $this->belongsToMany(User::class, 'kelas_mahasiswa', 'kelas_id', 'user_id');
    }
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'mata_kuliah');
    }


    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_pengampu');
    }
}
