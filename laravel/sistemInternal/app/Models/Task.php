<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'division_id',
        "user_id",
        'judul',
        'deskripsi',
        'status_task',
        'file_tugas',
        'tanggal_deadline'
    ];
    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }
    public function user()
    {
        return $this->belongsTo(user::class, 'user_id');
    }
}
