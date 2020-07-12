<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| AMA Routes
|--------------------------------------------------------------------------
*/

Route::get('/results', 'AmaController@results');
