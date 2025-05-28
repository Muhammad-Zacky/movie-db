<?php

namespace App\Models;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function movie(): HasMany
    {
        return $this->hasMany(Movie::class);
    }
}
