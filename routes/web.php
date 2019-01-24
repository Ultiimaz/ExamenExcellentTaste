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

use App\Reservation;
use App\TableReservation;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::post('/register','Auth\RegisterController@create');
Route::get('/home', 'HomeController@index')->name('home')->middleware('checkstatus');
Route::get('/contact', function () {
    return view('contact');
});
Route::post('/tables','ReserveerController@tables');
Route::get('/menukaart', function () {
    return view('menukaart');
});
Route::get('/beheerder', function () {
    return view('beheerder');
});
Route::get('/reserveer/update/{id}',function($id)
{
    $reservering = Reservation::where('reserveernummer', $id);
//    dd($reservering->get()->first());
    return view('reservering.update',['tables'=>\App\TableData::all(),'reservation' =>$reservering->get()->first()]);
});
Route::post('/reserveer/update/{id}','ReserveerController@update');

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
    Route::get('/reserveer/delete/{id}','ReserveerController@delete');
    Route::get('/reserveer/lijst','ReserveerController@index');
});

Route::middleware('auth:web')->group(function() {
    Route::get('/producten', 'ProductController@index');
    Route::post('/producten/update/{id}', 'ProductController@update');
    Route::post('/producten/create', 'ProductController@create');
    Route::get('/producten/delete/{id}', 'ProductController@delete');
});

Route::middleware('auth:web')->group(function() {
    Route::get('/tafels', 'TafelController@index');
    Route::post('/tafels/update/{id}', 'TafelController@update');
    Route::post('/tafels/create', 'TafelController@create');
    Route::get('/tafels/delete/{id}', 'TafelController@delete');
});

