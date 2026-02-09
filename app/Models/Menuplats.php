<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menuplats extends Model
{
    protected $table = 'menuplats';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'menus_id',
        'plats_id',
    ];

    public function menuses()
    {
        return $this->belongsTo(Menuses::class);
    }

    public function plats()
    {
        return $this->belongsTo(Plats::class);
    }
}
