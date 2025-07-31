<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    protected $table = 'showtimes';
    protected $fillable = ['movie_id', 'studio_id', 'show_date', 'start_time', 'end_time', 'price'];
}
