<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $fillable = ['user_id', 'showtime_id', 'total_price', 'status', 'booking_code', 'reserved_until'];
}
