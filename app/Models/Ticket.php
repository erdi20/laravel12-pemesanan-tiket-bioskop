<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $fillable = ['booking_id', 'seat_id', 'ticket_number', 'qr_code_path'];
}
