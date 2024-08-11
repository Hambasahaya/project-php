<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Users_Detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'NIK',
        'posisi',
        'Direktorat',
        'No_WhatsApp'
    ];
    public function Users()
    {
        return $this->belongsTo(User::class, "id_user");
    }
}
