<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    protected $table = 'reservations';
    protected $fillable = [
        'date',
        'time_slot',
        'status',
        'total_price',
        'users_id',
    ];
}
