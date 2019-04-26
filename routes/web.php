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

Route::get('/home', 'HomeController@index')->name('home');

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

Route::group(['middleware'=>['can:superadmin'],'prefix'=>'admin'],function(){
    Route::get('/','AdminDashboardController@index')->name('admin.dashboard');
    Route::get('manajemen-driver','VerifikasiController@indexDriver')->name('admin.manajemen.driver');
    Route::get('manajemen-pembeli','VerifikasiController@indexPembeli')->name('admin.manajemen.pembeli');
    Route::get('manajemen-penjual','VerifikasiController@indexPenjual')->name('admin.manajemen.penjual');
    
    Route::post('verifikasi-driver/{idDriver}','VerifikasiController@updateDriver')->name('verif.driver');
    Route::post('verifikasi-Pembeli/{idPembeli}','VerifikasiController@updatePembeli')->name('verif.pembeli');
    Route::post('verifikasi-Penjual/{idPenjual}','VerifikasiController@updatePenjual')->name('verif.penjual');
    
    Route::get('profil-driver/{id}','DriverController@edit');
    Route::post('profil-driver/{id}','DriverController@update');
    
    Route::get('profil-penjual/{id}','PenjualController@edit');
    Route::post('profil-penjual/{id}','PenjualController@update');
    
    Route::get('profil-pembeli/{id}','PembeliController@edit');
    Route::post('profil-pembeli/{id}','PembeliController@update');
});


Route::group(['middleware'=>['can:penjual'], 'prefix'=>'penjual'],function(){
    Route::get('/','ProdukController@index')->name('penjual.dashboard');
    Route::get('manajemen-produk','ProdukController@index')->name('penjual.produk');
    Route::get('manajemen-produk/{produk}','ProdukController@edit')->name('produk.edit');
    Route::post('manajemen-produk/{produk}','ProdukController@update')->name('produk.update');    

    Route::prefix('galeri-produk')->group(function(){
        Route::get('/{produk}','GalleryController@create')->name('galeri.create');
        Route::post('/{produk}','GalleryController@store')->name('galeri.store');
        Route::post('/hapus/{fotoproduk}','GalleryController@delete')->name('photo.delete');
    });

    
});



