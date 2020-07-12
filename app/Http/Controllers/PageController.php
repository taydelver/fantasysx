<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $data = ['id' => $user->id, 'name' => $user->name, 'display_name' => $user->display_name];
        return view('app.index')->with('data', $data);
    }
}
