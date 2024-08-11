<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Resep extends Model
{
    use HasFactory;
    protected $table = "resep_obat";
    protected $fillable = [
        'id_resep',
        'id_obat',
        'id_user',
    ];
    public function resep()
    {
        return $this->belongsTo(Resep::class, 'id_resep');
    }
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }
}
