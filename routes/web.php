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

// Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::middleware(['guest'])->group(function(){
    Route::view('daftar-registrasi','auth.daftar-registrasi')->name('register.index');
    Route::get('register/{jenis?}','Auth\CustomRegisterController@buat')->name('register');
    Route::post('register/driver','Auth\CustomRegisterController@simpanDriver');
    Route::post('register/penjual','Auth\CustomRegisterController@simpanPembeli');
    Route::post('register/pembeli','Auth\CustomRegisterController@simpanPenjual');
});



Route::get('/home', 'HomeController@index')->name('home');
