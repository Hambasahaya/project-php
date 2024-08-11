<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produks extends Model
{
    protected $table = "produk";
    public $timestamps = true;
    protected $primaryKey = 'id_produk';
    protected $fillable = [
        'nama_produk',
        'foto',
        "deskirpsi",
        'berat',
        'stok',
        'kategori_produk'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriProduk::class, 'kategori_produk');
    }
    public function galeri()
    {
        return $this->hasMany(Galeri_Produk::class, 'id_produk');
    }
}
