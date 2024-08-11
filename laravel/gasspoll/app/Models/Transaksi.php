<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = "transaksi";
    public $timestamps = false;
    protected $primaryKey = 'id_transaksi';
    protected $fillable = [
        'no_transaksi',
        'id_user',
        'id_produk',
        "qty",
        'harga',
        'subtotal',
    ];

    public function Produk()
    {
        return $this->belongsTo(Produks::class, 'id_produk');
    }
    public function Detail_transaksi()
    {
        return $this->belongsTo(Detail_transaksi::class, 'no_transaksi');
    }
    public function User()
    {
        return $this->belongsTo(UsersModel::class, 'id_user');
    }
}
