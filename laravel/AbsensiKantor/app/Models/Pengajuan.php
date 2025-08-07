<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Pengajuan extends Model
{

    protected $fillable = [
        'user_id',
        'jenis_pengajuan',
        'tanggal_mulai',
        'tanggal_selesai',
        'alasan',
        'status',
        'bukti'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
