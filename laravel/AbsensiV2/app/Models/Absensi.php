<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absensi extends Model
{
    protected $fillable = [
        "user_id",
        "jenis_tickets",
        "tanggal_absen",
        "status",
        "jam_masuk",
        "terlambat",
        "jam_pulang"
    ];

    public function user()
    {
        return $this->BelongsTo(User::class, 'user_id');
    }
}
