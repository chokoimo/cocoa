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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


    

Route::get('/', function () {
    return view('welcome');
});


Route::get('/reservation', 'ReservationController@getReservation')->middleware('auth');
Route::post('/reservation', 'ReservationController@postReservation')->middleware('auth');

Route::get('/calendar', 'ReservationController@index')->middleware('auth');

Route::get('/reservation/{id}','ReservationController@getReservationId')->middleware('auth');

Route::delete('/reservation', 'ReservationController@deleteReservation')->middleware('auth');





Route::get('/customer/create', 'CustomerController@getCustomer')->middleware('auth');
Route::post('/customer/create', 'CustomerController@postCustomer')->middleware('auth');

Route::get('/customer/index/{id}', 'CustomerController@getCustomerId')->middleware('auth');

Route::get('/customer/index', 'CustomerController@index')->middleware('auth');

Route::delete('/customer/index', 'CustomerController@deleteCustomer')->middleware('auth');


