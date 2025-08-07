<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class absens extends Model
{
    protected $fillable = [
        'user_id',
        'tanggal',
        'status',
        'jam_masuk',
        'foto_masuk',
        'lat_masuk',
        'lon_masuk',
        'terlambat',
        'jam_pulang',
        'foto_pulang',
        'lat_pulang',
        'lon_pulang',
    ];

    protected $casts = [
        'terlambat' => 'boolean',
        'tanggal' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
