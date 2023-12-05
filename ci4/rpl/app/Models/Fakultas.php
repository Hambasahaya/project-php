<?php

namespace App\Models;

use CodeIgniter\Model;

class Fakultas extends Model
{
    protected $table            = 'fakultas';
    protected $primaryKey       = 'id_fakultas';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [];
}
