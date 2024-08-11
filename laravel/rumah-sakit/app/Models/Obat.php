<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    protected $table = "obat";
    protected $fillable = [
        'id_rumah_sakit',
        'Nama_obat',
        'dosis_obat',
        "jenis_obat",
        'exp_obat',
        'dibuat_obat',
        'stock_obat',
        'harga_beli_obat',
        'harga_obat',
    ];
    public function fasyankes()
    {
        return $this->belongsTo(Fasyankes::class, 'id_rumahsakit');
    }
}
