<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailTransaksi extends Model
{
    protected $table            = 'detail_transaksi';
    protected $primaryKey       = 'nomor_transaksi';
    protected $returnType       = 'array';
    protected $allowedFields    = ['nomor_transaksi', 'id_transaksi', 'total', 'status_pembayaran', 'metode_pengririman', 'alamat_pengriman', 'nama_penerima', 'status_pengriman', 'lnk'];
}
