<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasyankes extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_users',
        'alamat_fasyankes',
        "No_sip_dokter",
        "Kategori_Fasyankes",
        "Status_Fasyankes",
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
}
