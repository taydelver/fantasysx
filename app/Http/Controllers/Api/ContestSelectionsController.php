<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\ContestSelection;
use App\ContestUser;

class ContestSelectionsController extends Controller
{
    public function userContestSelections(Request $request, $contestId)
    {
        $user = Auth::user();
        $selections = ContestSelection::where('user_id', $user->id)->where('contest_id', $contestId)->get();
        return $selections;
    }

    public function userContestSelectionsByClass(Request $request, $contestId, $raceClass)
    {
        $user = Auth::user();
        $selections = ContestSelection::where('user_id', $user->id)->where('contest_id', $contestId)->where('race_class_id', $raceClass)->get();
        return $selections;
    }

    public function addSelections(Request $request, $contestId)
    {
        $user = Auth::user();
        $contestUser = ContestUser::firstOrNew(['user_id' => $user->id, 'contest_id' => $contestId]);
        $contestUser->contest_selections()->delete();
        $contestUser->save();
        foreach($request->input('rider_ids') as $rider) {
            ContestSelection::updateOrCreate(
                ['rider_id' => $rider, 'contest_user_id' => $contestUser->id],
                ['position' => 0, 'points' => 0]
            );
        }
        $contestUser->status = 'entered';
        $contestUser->save();
        return $user->contests;
    }
}
