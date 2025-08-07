<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detail_user extends Model
{
    protected $fillable = [
        'user_id',
        'jurusan',
        'fakultas',
        'semester',
        'nuptk',
        'alamat',
        'no_hp',
        'jenis_kelamin',
        "pendidikan_terakhir",
        "foto"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
