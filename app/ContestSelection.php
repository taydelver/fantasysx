<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\Pivot;

class ContestSelection extends Model
{
    // public $incrementing = true;
    protected $guarded = [];
    protected $with = ['rider'];
    
    public function contest()
    {
        return $this->belongsTo('App\Contest');
    }

    public function contest_user()
    {
        return $this->belongsTo('App\ContestUser');
    }

    public function rider()
    {
        return $this->belongsTo('App\Rider');
    }

}
