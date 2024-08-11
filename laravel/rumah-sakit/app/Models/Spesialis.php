<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spesialis extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_rumah_sakit',
        'nama',
        'price_layanan',
        "qr_code",
    ];
    public function fasyankes()
    {
        return $this->belongsTo(Fasyankes::class, 'id_rumah_sakit');
    }
}
