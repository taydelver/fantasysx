<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    protected $guarded = [];

    public function race_class()
    {
        return $this->belongsTo('App\RaceClass', 'race_class', 'name');
    }
}
