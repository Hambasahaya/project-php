<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_transaksi extends Model
{
    use HasFactory;
    protected $table = "detail_transaksi";
    public $timestamps = false;
    protected $primaryKey = 'no_transaksi';
    protected $fillable = [
        'no_transaksi',
        'tgl_transaksi',
        "total",
        'status_pembayaran',
        'layanan_pengiriman',
        'biaya_pengiriman',
        'status_pengriman',
        "alamat_pengiriman",
        "link_pembayaran"
    ];
    public function transaksi()
    {
        return $this->belongsTo(KategoriProduk::class, 'no_transaksi');
    }
}
