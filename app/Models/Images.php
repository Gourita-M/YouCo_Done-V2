<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    // protected $table = 'images';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'restuarant_image',
        'restaurants_id',
    ];

    public function restaurants()
    {
        return $this->belongsTo(Restaurants::class);
    }
}
