<?php

namespace App\Models;

use CodeIgniter\Model;

class Pendaftar extends Model
{

    protected $table            = 'pendaftar';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['nim_pendaftar', 'nama_pendaftar', 'jurusan', 'fakultas', 'email', 'no_tlp', 'jk', 'foto', 'status_pendaftar'];
}
