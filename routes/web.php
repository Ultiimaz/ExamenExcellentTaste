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
Route::get('/profiel', function () {
    return view('profiel');
});
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
    Route::get('/producten/delete/{id}', 'ProductController@delete')->name('producten.delete');
});