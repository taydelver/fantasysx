<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth')->group(function() {
  // EVENTS
  Route::get('/events', 'EventsController@all');
  Route::get('/event/{raceEvent}', 'EventsController@single');
  Route::get('/event/{raceEvent}/races', 'EventsController@races');
  Route::get('/event/{raceEvent}/contests', 'EventsController@contests');
  // RACES
  Route::get('/race/{race}', 'RacesController@single');
  // CONTESTS
  Route::get('/contests', 'ContestsController@all');
  Route::get('/contest/{contest}', 'ContestsController@single');
  // RIDERS
  Route::get('/riders', 'RidersController@all');
  Route::get('/riders/{raceClass}', 'RidersController@byClass');
  // SELECTIONS
  Route::post('/selections/{contestId}/enter', 'ContestSelectionsController@addSelections');
  // USER
  Route::get('/user/check-contest', 'ContestsController@checkIfUserEntered');
  Route::get('/user/contests', 'ContestsController@userContests');
  // HELPERS
  Route::get('/helpers/format-money', 'HelpersController@formatMoney');
});