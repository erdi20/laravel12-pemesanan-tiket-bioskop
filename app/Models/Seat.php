<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Seat extends Model
{
    protected $table = 'seats';
    protected $fillable = ['studio_id', 'seat_row', 'seat_number', 'is_available'];

    public function Studio(): BelongsTo
    {
        return $this->belongsTo(Studio::class);
    }
}
