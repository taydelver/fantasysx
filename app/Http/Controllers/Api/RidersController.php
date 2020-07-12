<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Rider;
use App\RaceClass;

class RidersController extends Controller
{
    public function all(Request $request)
    {
        return Rider::available()->get();
    }

    public function byClass(Request $request, $raceClass)
    {
        // $contest = Contest::find($request->input('contest_id'));
        $orderBy = $request->filled('sortBy') ? $request->input('sortBy') : 'name';
        $sortOrder = $request->filled('sortOrder') ? $request->input('sortOrder') : 'asc';
        return Rider::where('race_class_id', $raceClass)->available()->orderBy($orderBy, $sortOrder)->get();
    }

}
