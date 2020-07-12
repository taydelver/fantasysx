<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContestUser extends Model
{
    protected $guarded = [];

    public function contest()
    {
        return $this->belongsTo('App\Contest');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function contest_selections()
    {
        return $this->hasMany('App\ContestSelection');
    }
}
