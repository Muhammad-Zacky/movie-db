<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'synopsis',
        'category_id',
        'year',
        'actors',
        'cover_image',
    ];

    /**
     * Get the category that the movie belongs to.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
