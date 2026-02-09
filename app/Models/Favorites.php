<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    protected $table = 'favorites';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'favorites_date',
        'restaurant_id',
        'users_id',
    ];

    public function restaurants()
    {
        return $this->belongsTo(Restaurants::class);
    }
}
