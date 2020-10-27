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

// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('start');
});

Route::group(['prefix' => 'dashboard'], function(){
    Route::get('/', 'DashboardController@index')->name('dashboard');
});

Route::group(['prefix' => 'koneksi'], function(){
    Route::get('/', 'KoneksiController@index')->name('koneksi');
    Route::get('get', 'KoneksiController@get')->name('koneksi.get');
    Route::post('store', 'KoneksiController@store')->name('koneksi.store');
    Route::get('edit/{id?}', 'KoneksiController@edit')->name('koneksi.edit');
    Route::get('create', 'KoneksiController@create')->name('koneksi.create');
    Route::get('delete/{id?}', 'KoneksiController@delete')->name('koneksi.delete');
    Route::post('update/{id?}', 'KoneksiController@update')->name('koneksi.update');
});

Route::group(['prefix' => 'start'], function(){
    Route::get('/', 'StartController@start')->name('start');
});

Route::group(['prefix' => 'objek'], function(){
    Route::get('/', 'ObjekController@index')->name('objek');
    Route::get('get', 'ObjekController@get')->name('objek.get');
    Route::post('store', 'ObjekController@store')->name('objek.store');
    Route::get('view/{id?}', 'ObjekController@view')->name('objek.view');
    Route::get('create', 'ObjekController@create')->name('objek.create');
    Route::get('edit/{id?}', 'ObjekController@edit')->name('objek.edit');
    Route::get('delete/{id?}', 'ObjekController@delete')->name('objek.delete');
    Route::get('get_data', 'ObjekController@get_data')->name('objek.get_data');
    Route::post('update/{id?}', 'ObjekController@update')->name('objek.update');
});

Route::group(['prefix' => 'jenis_dokumen'], function(){
    Route::get('/', 'JenisDokumenController@index')->name('jenis_dokumen');
    Route::get('get', 'JenisDokumenController@get')->name('jenis_dokumen.get');
    Route::post('store', 'JenisDokumenController@store')->name('jenis_dokumen.store');
    Route::get('edit/{id?}', 'JenisDokumenController@edit')->name('jenis_dokumen.edit');
    Route::get('create', 'JenisDokumenController@create')->name('jenis_dokumen.create');
    Route::get('delete/{id?}', 'JenisDokumenController@delete')->name('jenis_dokumen.delete');
    Route::post('update/{id?}', 'JenisDokumenController@update')->name('jenis_dokumen.update');
});

Route::group(['prefix' => 'cetak'], function(){
    Route::get('/', 'CetakController@index')->name('cetak');
});