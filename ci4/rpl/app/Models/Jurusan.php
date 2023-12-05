<?php

namespace App\Models;

use CodeIgniter\Model;

class Jurusan extends Model
{

    protected $table            = 'jurusan';
    protected $primaryKey       = 'id_jurusan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [];
}
