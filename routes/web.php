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

Route::get('dashboard','AdminDashboardController@index')->name('admin.dashboard');
Route::get('manajemen-driver','VerifikasiController@indexDriver')->name('admin.manajemen.driver');
Route::get('manajemen-pembeli','VerifikasiController@indexPembeli')->name('admin.manajemen.pembeli');
Route::get('manajemen-penjual','VerifikasiController@indexPenjual')->name('admin.manajemen.penjual');

Route::post('verifikasi-driver/{idDriver}','VerifikasiController@updateDriver')->name('verif.driver');
Route::post('verifikasi-Pembeli/{idPembeli}','VerifikasiController@updatePembeli')->name('verif.pembeli');
Route::post('verifikasi-Penjual/{idPenjual}','VerifikasiController@updatePenjual')->name('verif.penjual');



Route::get('/home', 'HomeController@index')->name('home');
