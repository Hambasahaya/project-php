<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoriProduct extends Model
{
    /** @use HasFactory<\Database\Factories\KategoriProductFactory> */
    use HasFactory;
    protected $primaryKey = 'id_kategori';
    protected $fillable = [
        "kategori_prd"
    ];
}
