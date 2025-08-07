<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categories extends Model
{
    protected $primaryKey  = "id_categories";
    protected $fillable = [
        'nama_categories'
    ];
}
