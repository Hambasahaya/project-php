<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Katgori_laporans extends Model
{
    protected $fillable = [
        'kategori_laporan',
    ];
    public function laporans()
    {
        return $this->hasMany(Laporan::class, 'kategori_laporan');
    }
}
