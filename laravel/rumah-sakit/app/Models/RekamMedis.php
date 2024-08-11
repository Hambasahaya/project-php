<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;
    protected $table = "rekam_medis";
    protected $fillable = [
        'id_paseint',
        'fasyankes',
        'dokter',
        'diagnosa_awal',
        "diagnosa_akhir",
        "pengobatan_dijalani"
    ];
    public function user()
    {
        return $this->belongsTo(user::class, 'id_pasient');
    }
    public function fasyankes()
    {
        return $this->belongsTo(fasyankes::class, 'fasyankes');
    }
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter');
    }
}
