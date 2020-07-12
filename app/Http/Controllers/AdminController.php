<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\RaceEvent;

//test
use App\Jobs\LiveTiming;

class AdminController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended();
        } else {
            return back()->withErrors(['errors' => 'Invalid Email or Password']);
        }
    }

    public function loginPage(Request $request)
    {
        return view('auth.admin-login');
    }

    public function dashboard(Request $request)
    {
        $events = RaceEvent::orderBy('round', 'asc')->get();
        return view('admin.dashboard', compact('events'));
    }

    public function sync(Request $request)
    {
        return view('admin.sync');
    }

    public function jobTest(Request $request)
    {
        $data = [];
        LiveTiming::dispatch($data);
        return back();
    }
}
