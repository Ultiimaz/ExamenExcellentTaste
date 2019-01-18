<?php

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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

    Route::post('/register','Auth\RegisterController@create');
Route::get('/home', 'HomeController@index')->name('home')->middleware('checkstatus');
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/menukaart', function () {
    return view('menukaart');
});
Route::get('/beheerder', function () {
    return view('beheerder');
});

//});
Route::get('/profiel', function () {

    $user = Auth::user();


    return view('/profiel', ['user' => $user]);

});
Route::post('/profiel/update/{id}', 'ProfielController@update');
//Route::middleware('auth:web')->group(function() {
//    Route::get('/profiel', 'ProfielController@index');
//    Route::post('/profiel/update/{id}', 'ProductController@update');
//});

Route::post('/reserveer/create','ReserveerController@create');
Route::middleware('auth:web')->group(function()
{
    Route::get('/reserveer/','ReserveerController@index')->name('overzicht');
    Route::get('/reserveer/create',function()
    {
        return view('reservering.create');
    })->name('reserveercreate');
//    Route::post('/reserveer/create','ReserveerController@create');
    Route::post('/reserveer/update','ReserveerController@update');
    Route::get('/reserveer/delete/{id}','ReserveerController@delete');
});

Route::middleware('auth:web')->group(function() {
    Route::get('/producten', 'ProductController@index');
    Route::post('/producten/update/{id}', 'ProductController@update');
    Route::post('/producten/create', 'ProductController@create');
});
