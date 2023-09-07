<?php

namespace App\Models;

use CodeIgniter\Model;

class Karyawan_data extends Model
{
    protected $table      = 'karyawan';
    protected $primaryKey = 'id_karyawan';
    protected $useAutoIncrement = true;
    protected $allowedFields = ["nama_karyawan", "alamat", "username", "password", "no_tlp", "jabtaan", "foto"];
}
