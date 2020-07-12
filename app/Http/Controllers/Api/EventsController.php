<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\RaceEvent;
use App\Http\Resources\RaceEventResource;

class EventsController extends Controller
{
    public function all(Request $request)
    {
        $events = RaceEvent::orderBy('round', 'asc')->get();
        return RaceEventResource::collection($events);
    }

    public function upcoming(Request $request)
    {
        $events = RaceEvent::upcoming()->orderBy('round', 'asc')->get();
        return $events;
    }

    public function single(Request $request, RaceEvent $raceEvent)
    {
        return $raceEvent;
    }

    public function races(Request $request, RaceEvent $raceEvent)
    {
        // Event Races
        $races = $raceEvent->races()->orderBy('race_class_id', 'asc');
        return $races;
    }

    public function contests(Request $request, RaceEvent $raceEvent)
    {
        // Event Contests
        $contests = $raceEvent->contests;
        return $contests;
    }
}
