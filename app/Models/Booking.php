<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $fillable = ['user_id', 'showtime_id', 'total_price', 'status', 'booking_code', 'reserved_until'];
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function Showtime(): BelongsTo
    {
        return $this->belongsTo(Showtime::class);
    }
    public function Tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
