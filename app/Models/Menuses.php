<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menuses extends Model
{
    protected $table = 'menuses';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'restaurants_id',
    ];

    public function menuplats()
    {
        return $this->hasMany(Menuplats::class);
    }

    public function restaurants()
    {
        return $this->belongsTo(Restaurants::class);
    }
}
