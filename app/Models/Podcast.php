<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Podcast extends Model
{
    use HasFactory;

    /**
     * Get the category that the podcast belongs to.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the episodes for the podcast.
     */
    public function episodes(): HasMany {
        return $this->hasMany(Episode::class);
    }
}
