<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'amount',
        'method',
        'status',
        'payment_date',
        'reservations_id'
    ];
}
