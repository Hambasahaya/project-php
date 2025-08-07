<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
        "nim",
        "role"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'kelas_mahasiswa', 'user_id', 'kelas_id');
    }
    public function dosen_pengampu()
    {
        return $this->hasMany(Kelas::class, 'dosen_pengampu');
    }
    public function detail()
    {
        return $this->hasOne(detail_user::class);
    }
}
