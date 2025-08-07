<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail_users extends Model
{
    protected $fillable = [
        'user_id',
        'alamat_lengkap',
        'tanggal_lahir',
        'no_hp',
        'jenis_kelamin',
        'foto_profil',
    ];
    public function user()
    {
        return $this->belongsTo(user::class, 'user_id');
    }
}
