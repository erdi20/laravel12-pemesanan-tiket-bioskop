<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movie extends Model
{
    protected $table = 'movies';

    protected $fillable = [
        'title',
        'description',
        'duration',
        'release_date',
        'poster',
    ];

    public function Genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }

    public function Showtimes(): HasMany
    {
        return $this->hasMany(Showtime::class);
    }
}
