<?php

namespace App\Ama;

use Illuminate\Support\Facades\Http;

class AmaFetch
{
    public static function raceResults()
    {
      $url = config('ama.results_url');
      $response = Http::get($url);
      return $response->body();
    }
}
