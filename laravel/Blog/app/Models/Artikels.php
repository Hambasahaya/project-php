<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Artikels extends Model
{
    use HasFactory;
    protected $table = 'artikels';
    protected $fillable = [
        'title_artikel',
        'sub_heading',
        'body_artikel',
        'img_artikel',
        'id_category',
        "click_count"
    ];
    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class, "id_category");
    }
}
