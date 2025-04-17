<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Episode extends Model
{
    use HasFactory;

    /**
     * The podcast that this episode belongs to.
     */
    public function podcast(): BelongsTo
    {
        return $this->belongsTo(Podcast::class);
    }
}
