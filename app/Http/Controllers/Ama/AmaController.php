<?php

namespace App\Http\Controllers\Ama;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AmaController extends Controller
{
    public function results(Request $request)
    {
        $url = config('ama.results_url');
        $response = Http::get($url);
        return $response->json();
    }

}