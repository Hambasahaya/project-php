<?php

namespace App\Models;

use CodeIgniter\Model;

class Vote extends Model
{
    protected $table            = "voting";
    protected $primaryKey       = 'id_voting';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["id_voting", "kategori_voting", "pemilih", "vote_to", "point"];
}
