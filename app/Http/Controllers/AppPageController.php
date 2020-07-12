<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}
