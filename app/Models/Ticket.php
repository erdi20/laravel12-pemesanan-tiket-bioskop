<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $fillable = ['booking_id', 'seat_id', 'ticket_number', 'qr_code_path'];
    public function Booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }
    public function Seat(): BelongsTo
    {
        return $this->belongsTo(Seat::class);
    }
}
