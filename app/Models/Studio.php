<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    protected $table = 'studios';
    protected $fillable = ['name', 'total_seats', 'row_count', 'column_count'];

    public function Seats(): HasMany
    {
        return $this->hasMany(Seat::class);
    }

    public function Showtimes(): HasMany
    {
        return $this->hasMany(Showtime::class);
    }
}
