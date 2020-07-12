<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Rider extends Model
{
    protected $guarded = [];
    protected $appends = ['plate_image', 'money_value'];

    public function race_class()
    {
        return $this->belongsTo('App\RaceClass', 'race_class_id', 'name');
    }
    
    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    public function getPlateImageAttribute()
    {
        if($this->bike_brand) {
            $abbr = Str::substr($this->bike_brand, 0, 3);
            return '/assets/img/plates/plate_' . $abbr . '.png';
        } else {
            return '/assets/img/plates/plate_default.png';
        }
        
    }

    public function getMoneyValueAttribute()
    {
        return number_format($this->value);
    }


    // public function scopeRegion($query, $region)
    // {
    //     if($region == 'east') {
    //         return $query->where('status', 'available');
    //     }
    //     if($region == 'west') {
    //         return $query->where('status', 'available');
    //     }
        
    // }
}
