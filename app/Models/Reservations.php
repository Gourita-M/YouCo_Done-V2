<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    protected $table = 'reservations';

    public $timestamps = false;
    
    protected $fillable = [
        'date',
        'time_slot',
        'status',
        'total_price',
        'users_id',
    ];
}
