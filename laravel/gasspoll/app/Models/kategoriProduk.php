<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoriProduk extends Model
{
    use HasFactory;
    protected $table = "kategori_produk";
    public $timestamps = false;
    protected $primaryKey = 'id_kategori';
    protected $fillable = [
        'foto',
        'kategori'
    ];
}
