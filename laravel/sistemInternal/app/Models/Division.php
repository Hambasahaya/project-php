<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = [
        'nama_divisi',
        'kepala_divisi',
    ];
    public function tasks()
    {
        return $this->hasMany(Task::class, 'division_id');
    }
    public function user()
    {
        return $this->hasMany(user::class, 'division_id');
    }
    public function kadiv()
    {
        return $this->belongsTo(user::class, 'kepala_divisi');
    }
}
