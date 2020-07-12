<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelpersController extends Controller
{
    public function formatMoney(Request $request)
    {
      return number_format($request->input('value'));
    }

}
