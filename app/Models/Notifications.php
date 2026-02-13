<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Reservations;

class Notifications extends Model
{

     public $timestamps = false;

    protected $fillable = [
        'message',
        'date_sent',
        'restaurant_id',
        'seen',
        'users_id'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurants::class);
    }
}
