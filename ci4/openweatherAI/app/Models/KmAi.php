<?php

namespace App\Models;

use CodeIgniter\Model;

class KmAi extends Model
{
    protected $table            = 'data_gizi';
    protected $primaryKey       = 'ID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "ID",
        "Kelompok Umur",
        "Kategori",
        "Berat Badan (kg)",
        "Tinggi Badan (cm)",
        "Energi (kkal)",
        "Protein Total",
        "Lemak (g) Omega 3",
        "Lemak (g) Omega 6",
        "lemak_total",
        "Karbohidrat",
        "Serat (g)",
        "Air (ml)"
    ];
}
