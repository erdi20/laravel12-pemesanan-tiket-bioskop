<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Showtime extends Model
{
    protected $table = 'showtimes';
    protected $fillable = ['movie_id', 'studio_id', 'show_date', 'start_time', 'end_time', 'price'];

    public function Movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }

    public function Studio(): BelongsTo
    {
        return $this->belongsTo(Studio::class);
    }
}
