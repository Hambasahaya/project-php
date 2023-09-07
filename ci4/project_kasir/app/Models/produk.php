<?php

namespace App\Models;

use CodeIgniter\Model;

class Produk extends Model
{

    protected $table      = 'produk';
    protected $primaryKey = 'id_produk';
    protected $useAutoIncrement = true;
    protected $allowedFields = ["nama_prd", "harga_prd", "harga_beli", "stok", "supel"];
}
