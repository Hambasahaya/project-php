<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;
    protected $table = "resep";
    protected $fillable = [
        'id_pendaftaran',
        'id_user',
        'id_dokter',
        'diagnosa',
        "notes",
    ];
    public function user()
    {
        return $this->belongsTo(user::class, 'id_user');
    }
    public function pendaftaranPasient()
    {
        return $this->belongsTo(pendaftaranPasient::class, 'id_pendaftaran');
    }
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }
}
