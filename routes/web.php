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
Auth::routes(['verify' => true]);

Route::post('/register','Auth\RegisterController@create');
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/menukaart', function () {
    return view('menukaart');
});
Route::get('/beheerder', function () {
    return view('beheerder');
});

Route::get('/profiel', function () {

    $user = Auth::user();


    return view('/profiel', ['user' => $user]);

});
Route::post('/profiel/update/{id}', 'ProfielController@update');
//Route::middleware('auth:web')->group(function() {
//    Route::get('/profiel', 'ProfielController@index');
//    Route::post('/profiel/update/{id}', 'ProductController@update');
//});
Route::get('/beheerder', function(){
    return view('layouts.beheerder');
});

Route::post('/reserveer','ReserveerController@create')->name('reserveer');
Route::middleware('auth:web')->group(function()
{
    Route::get('/reserveer',function()
    {
        return view('reservering.create',['tables'=>\App\TableData::all()]);
    })->name('reserveercreate');
//    Route::post('/reserveer/create','ReserveerController@create');
    Route::post('/reserveer/update','ReserveerController@update');
    Route::get('/reserveer/delete/{id}','ReserveerController@delete');
});

Route::middleware('auth:web')->group(function() {
    Route::get('/producten', 'ProductController@index');
    Route::post('/producten/update/{id}', 'ProductController@update');
    Route::post('/producten/create', 'ProductController@create');
    Route::get('/producten/delete/{id}', 'ProductController@delete');

    Route::post('/producten/categories/create', 'ProductController@categoriesCreate');
    Route::get('/producten/categories/delete{id}', 'ProductController@categoriesDelete');
});

Route::middleware('auth:web')->group(function() {
    Route::get('/tafels', 'TafelController@index');
    Route::post('/tafels/update/{id}', 'TafelController@update');
    Route::post('/tafels/create', 'TafelController@create');
    Route::get('/tafels/delete/{id}', 'TafelController@delete');
});

Route::middleware('auth:web')->group(function() {
    Route::get('/gebruikers', 'UserController@index');
    Route::get('/gebruikers/{id}', 'UserController@view');
    Route::post('/gebruikers/update/{id}', 'UserController@update');
    Route::get('/gebruikers/block/{id}', 'UserController@block');
    Route::get('/gebruikers/unblock/{id}', 'UserController@unblock');
    Route::post('/gebruikers/create', 'UserController@create');
    Route::get('/gebruikers/delete/{id}', 'UserController@delete');
});
