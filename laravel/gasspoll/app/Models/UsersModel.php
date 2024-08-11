<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersModel extends Authenticatable
{
    use HasFactory;

    protected $table = "users";
    public $timestamps = false;
    protected $primaryKey = 'id_users';
    protected $fillable = [
        'email',
        'password',
        'phone',
        'level',
        "Nama_lengkap",
        "Foto",
        "jk"
    ];
}
