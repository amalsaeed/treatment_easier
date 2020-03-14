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

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');

Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::post('/profile/update', 'ProfileController@update')->name('profile.update');

    Route::get('/reservations', 'ReservationController@index')->name('reservations');
    Route::get('/reservations/create', 'ReservationController@create')->name('reservations.create');
    Route::post('/reservations/store', 'ReservationController@store')->name('reservations.store');
    Route::get('/reservations/edit/{id}', 'ReservationController@edit')->name('reservations.edit');
    Route::post('/reservations/update/{id}', 'ReservationController@update')->name('reservations.update');
    Route::post('/reservations/cancel/{id}', 'ReservationController@cancel')->name('reservations.cancel');
});

