<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $guarded = [];
    protected $appends = [];

    public function scopeUpcoming($query)
    {
        return $query->where('status', 'upcoming');
    }
    
    public function race_event()
    {
        return $this->belongsTo('App\RaceEvent');
    }

    public function users()
    {
        return $this->hasMany('App\ContestUser');
    }
}
