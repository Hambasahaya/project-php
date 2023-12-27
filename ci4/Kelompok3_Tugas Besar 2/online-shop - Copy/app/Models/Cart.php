<?php

namespace App\Models;

use CodeIgniter\Model;

class Cart extends Model
{
    protected $table            = 'cart';
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_produk', 'id_user', 'qty', 'price', 'subtotal', 'status'];
}
