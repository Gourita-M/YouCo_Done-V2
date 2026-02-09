<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurants extends Model
{   
    protected $table = 'restaurants';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'city',
        'cuisine_type',
        'adress',
        'capacity',
        'openhours',
        'closehours',
        'users_id',
    ];

    public function images()
    {
        return $this->hasMany(Images::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorites::class);
    }

    public function Menuses()
    {
        return $this->hasMany(Menuses::class);
    }
}
