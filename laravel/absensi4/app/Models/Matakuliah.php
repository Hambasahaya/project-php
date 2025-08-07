<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $fillable = [
        'nama_matakuliah',
        'semester',
        'foto_matakuliah'
    ];
}
