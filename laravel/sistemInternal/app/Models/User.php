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
        'division_id',
        'role_id'
    ];
    public function task()
    {
        return $this->hasMany(task::class, 'user_id');
    }
    public function detail()
    {
        return $this->hasMany(Detail_users::class, 'user_id');
    }
    public function absen()
    {
        return $this->hasMany(Absen::class, 'user_id');
    }
    public function kadiv()
    {
        return $this->hasMany(division::class, 'kepala_divisi');
    }
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    public function divisi()
    {
        return $this->belongsTo(division::class, 'division_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
