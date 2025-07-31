<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $table = 'seats';
    protected $fillable = ['studio_id', 'seat_row', 'seat_number', 'is_available']; 
}
