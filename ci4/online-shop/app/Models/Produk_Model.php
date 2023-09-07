<?php

namespace App\Models;

use CodeIgniter\Model;

class Produk_Model extends Model
{
    protected $table            = 'produk';
    protected $primaryKey       = 'id_produk';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["nama_produk", "desk", "spek", "gambar", "ukuran", "harga"];
}
