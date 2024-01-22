<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'nim';
    protected $returnType       = 'array';
    protected $allowedFields    = ["nim", "nama", "prodi"];
}
