<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plats extends Model
{
    protected $table = 'plats';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'content',
        'Prize',
    ];

    public function menuplats()
    {
        return $this->hasMany(Menuplats::class);
    }
}
