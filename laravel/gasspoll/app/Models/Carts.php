<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Carts extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = "keranjang";
    public $timestamps = false;
    protected $primaryKey = 'id_keranjang';
    protected $fillable = [
        'id_user',
        'id_produk',
        'qty',
        'subtotal'
    ];
    public function Produk()
    {
        return $this->belongsTo(Produks::class, 'id_produk');
    }
    public function User()
    {
        return $this->belongsTo(UsersModel::class, 'id_user');
    }
}
