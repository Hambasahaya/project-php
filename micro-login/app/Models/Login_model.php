<?php

namespace App\Models;

use CodeIgniter\Model;

class Login_model extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id_user';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_user', 'password', 'alamat', 'jk', 'foto', 'no_tlp'];
}
