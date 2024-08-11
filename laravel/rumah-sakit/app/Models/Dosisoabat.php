<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosisobat extends Model
{
    use HasFactory;
    protected $table = "dosis_obat";
    protected $fillable = [
        'id_obat',
        'aturan_minum',
        'untuk',
    ];
    public function fasyankes()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }
}
