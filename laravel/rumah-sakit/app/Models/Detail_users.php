<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_users extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'alamat_lengkap',
        'Gol_darah',
        'asuransi',
        'id_asuransi',
        "no_asuransi"
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
