<?php

namespace App\Models;

use CodeIgniter\Model;

class Optionvote extends Model
{
    protected $table            = 'option_voting';
    protected $primaryKey       = 'id_option';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["id_option", "kategori", "value_voting"];
}
