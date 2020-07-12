<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaceEvent extends Model
{
    protected $guarded = [];
    protected $casts = [
        'selections_open' => 'boolean',
        'is_triplecrown' => 'boolean'
    ];

    public function races()
    {
        return $this->hasMany('App\Race');
    }

    public function contests()
    {
        return $this->hasMany('App\Contest');
    }

    public function scopeUpcoming($query)
    {
        return $query->where('status', 'upcoming');
    }
}
