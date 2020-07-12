<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Race;

class RacesController extends Controller
{
    public function single(Request $request, Race $race)
    {
        return $race;
    }
}
