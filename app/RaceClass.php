<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaceClass extends Model
{
    protected $primaryKey = 'name';
    public $incrementing = false;

    public function races()
    {
        return $this->hasMany('App\Race');
    }

    public function riders()
    {
        return $this->hasMany('App\Rider');
    }
}
