<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;
    protected $table = "carts";
    protected $primaryKey = 'id_cart';
    protected $fillable = [
        'qty',
        'id_product',
        'id_user',
        'sub_total',
        "status_pesanan"
    ];
    public function product()
    {
        return $this->belongsTo(Products::class, 'id_product', 'id_product');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
