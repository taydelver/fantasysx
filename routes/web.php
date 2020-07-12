<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| FOR FRONTEND
|--------------------------------------------------------------------------
|*/
Route::domain('app.fantasysx.test')->group(function () {
    Route::get('/', function() {
        return redirect('/dashboard');
    });
    Route::get('/{slug}', 'PageController@index')->where('slug', '^(?!nova|storage|login|assets).*$')->middleware('auth');
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
|*/
Route::get('/admin/login', 'AdminController@loginPage')->middleware('guest');
// Route::get('/admin', function() {
//     return redirect('/admin/dashboard');
// })->middleware('admin');
// Route::get('/admin/dashboard', 'AdminController@dashboard')->middleware('admin');
// Route::get('/admin/sync', 'AdminController@sync')->middleware('admin');
Route::post('/admin/login', 'AdminController@authenticate')->name('admin.login')->middleware('guest');
Route::post('/import/riders', 'ImportsController@riderImport')->name('import.riders');
/*
|--------------------------------------------------------------------------
| MISC
|--------------------------------------------------------------------------
|*/
Route::get('/home', 'HomeController@index')->name('home');
