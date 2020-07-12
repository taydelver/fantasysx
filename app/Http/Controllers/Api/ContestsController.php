<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Contest;
use App\ContestUser;
use App\Http\Resources\ContestResource;
use App\Http\Resources\ContestUserResource;

class ContestsController extends Controller
{
    public function all(Request $request)
    {
        $contests = Contest::upcoming()->get();
        return $contests;
    }

    public function single(Request $request, Contest $contest)
    {
        return new ContestResource($contest);
    }

    public function checkIfUserEntered(Request $request)
    {
        $user = Auth::user();
        $contestId = $request->input('contest_id');
        $contestUser = ContestUser::where('contest_id', $contestId)->where('user_id', $user->id)->first();
        if($contestUser) {
            return new ContestUserResource($contestUser);
        }
        return false;
    }

    public function userContests(Request $request)
    {
        $user = Auth::user();
        return $user->contests;
    }

}
