<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Products extends Model
{
    /** @use HasFactory<\Database\Factories\ProductsFactory> */
    use HasFactory, Notifiable;
    protected $primaryKey = "id_product";
    protected $fillable = [
        'nama_product',
        'id_kategori',
        'img_product',
        'stock',
        'price',
        'desc'
    ];
    public function kategoriprd()
    {
        return $this->belongsTo(kategoriProduct::class, 'id_kategori');
    }
}
