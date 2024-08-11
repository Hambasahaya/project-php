<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $table = "dokter";
    protected $fillable = [
        'id_user',
        'id_fasyankes',
        'alamat_lengkap',
        'no_SIP',
        "id_spesialis",
        'Status_dokter',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function spesialis()
    {
        return $this->belongsTo(spesialis::class, 'id_spesialis');
    }
    public function fasyankes()
    {
        return $this->belongsTo(Fasyankes::class, 'id_fasyankes');
    }
}
