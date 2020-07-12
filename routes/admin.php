<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/dashboard', 'AdminController@dashboard');
Route::get('/sync', 'AdminController@sync');
// /// TEST
// Route::post('/job-test', 'AdminController@jobTest')->name('jobtest');

Route::get('/', function() {
  return redirect('/admin/dashboard');
});




