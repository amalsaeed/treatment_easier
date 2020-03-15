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

Route::get('/admin/login', 'Auth\LoginController@show_admin_login_page');
Route::post('/admin/login', 'Auth\LoginController@adminLogin');

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

Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/admin/doctors', 'AdminController@doctors')->name('admin.doctors');
    Route::get('/admin/clinics', 'AdminController@clinics')->name('admin.clinics');
});



//pages
Route::get('/clinics/dentistry', 'PagesController@dentistryClinics')->name('dentistry');
Route::get('/clinics/Orthopedic', 'PagesController@OrthopedicClinics')->name('Orthopedic');
Route::get('/clinics/Children', 'PagesController@ChildrenClinics')->name('Children');
Route::get('/clinics/Heart', 'PagesController@HeartClinics')->name('Heart');
Route::get('/clinics/Internist', 'PagesController@InternistClinics')->name('Internist');
Route::get('/clinics/Gynecology', 'PagesController@GynecologyClinics')->name('Gynecology');
Route::get('/clinics/Ophthalmology', 'PagesController@OphthalmologyClinics')->name('Ophthalmology');
Route::get('/clinics/Throat', 'PagesController@ThroatClinics')->name('Throat');
