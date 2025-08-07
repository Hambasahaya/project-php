<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    /** @use HasFactory<\Database\Factories\PesananFactory> */
    use HasFactory;
    protected $table = "pesanan";
    protected $fillable = [
        'id_cart',
        "no_pesanan",
        'tgl_pesanan',
        'status_pesanan',
        "notes"
    ];
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'id_cart');
    }
}
