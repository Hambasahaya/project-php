<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
        'foto',
        "role"
    ];
    public function detailUser()
    {
        return $this->hasOne(detail_users::class);
    }

    public function pengalamanKerja()
    {
        return $this->hasMany(pengalaman_kerjas::class);
    }

    public function lowongans()
    {
        return $this->hasMany(lowongans::class, 'user_id');
    }

    public function lamaran()
    {
        return $this->hasMany(lowongan_applys::class, 'pelamar_id');
    }
    public function perusahaan()
    {
        return $this->hasMany(lowongan_applys::class, 'perusahaan_id');
    }

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
}
