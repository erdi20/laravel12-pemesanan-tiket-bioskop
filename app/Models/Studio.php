<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    protected $table = 'studios';
    protected $fillable = ['name', 'total_seats', 'row_count', 'column_count']; 
}
