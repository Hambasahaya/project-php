<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leave_Ticket extends Model
{
    protected $fillable = [
        'user_id',
        'jenis_tickets',
        'start',
        'end',
        'alasan',
        'bukti',
        'status'
    ];
    public function user()
    {
        return $this->BelongsTo(User::class, 'user_id');
    }
}
