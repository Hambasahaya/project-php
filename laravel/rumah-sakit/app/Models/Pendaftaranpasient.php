<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaranpasient extends Model
{
    use HasFactory;
    protected $table = "pendaftaran_pasien";
    protected $fillable = [
        'id_user',
        'id_fasyankes',
        'id_spesialis',
        "nomor_antrian",
        "status",
        'resep',
        "rekam_medis",
        "tanggal_berobat",
        'alamat',
        'cretated_at'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function fasyankes()
    {
        return $this->belongsTo(Fasyankes::class, 'id_fasyankes');
    }
    public function spesialis()
    {
        return $this->belongsTo(Spesialis::class, 'id_spesialis');
    }
}
