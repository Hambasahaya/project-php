<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri_Produk extends Model
{
    protected $table = 'galeri_produk';
    public $timestamps = false;
    protected $primaryKey = 'id_produk';
    protected $fillable = [
        'id_produk', 'nama_foto',
    ];
    public function produk()
    {
        return $this->belongsTo(Produks::class, 'id_produk');
    }
}
