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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//Route::post('/home', 'HomeController@show')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::get('/barang','BarangController@index')->name('barang.index');
Route::get('/barang/tambah','BarangController@create')->name('barang.create');
Route::post('/barang/store','BarangController@store')->name('barang.store');
Route::get('/barang/{id}','BarangController@destroy')->name('barang.destroy');
Route::get('/barang/{id}/edit','BarangController@edit')->name('barang.edit');
Route::put('/barang/{id}/update','BarangController@update')->name('barang.update');

Route::get('/beritamasuk','BeritaMasukController@index')->name('beritamasuk.index');
Route::get('/beritamasuk/tambah','BeritaMasukController@create')->name('beritamasuk.create');
Route::post('/beritamasuk/store','BeritaMasukController@store')->name('beritamasuk.store');
Route::get('/beritamasuk/show/{id}','BeritaMasukController@show')->name('beritamasuk.show');
Route::get('/beritamasuk/{id}','BeritaMasukController@destroy')->name('beritamasuk.destroy');
Route::get('/beritamasuk/{id}/edit','BeritaMasukController@edit')->name('beritamasuk.edit');
Route::put('/beritamasuk/{id}/update','BeritaMasukController@update')->name('beritamasuk.update');
Route::get('beritamasuk/{id}/print', 'BeritaMasukController@print')->name('beritamasuk.print');


Route::get('/beritakeluar','BeritaKeluarController@index')->name('beritakeluar.index');
Route::get('/beritakeluar/tambah','BeritaKeluarController@create')->name('beritakeluar.create');
Route::post('/beritakeluar/store','BeritaKeluarController@store')->name('beritakeluar.store');
Route::post('/beritakeluar/show/{id}','BeritaMasukController@store')->name('beritakeluar.show');
Route::get('/beritakeluar/{id}','BeritaKeluarController@destroy')->name('beritakeluar.destroy');
Route::get('/beritakeluar/{id}/edit','BeritaKeluarController@edit')->name('beritakeluar.edit');
Route::put('/beritakeluar/{id}/update','BeritaKeluarController@update')->name('beritakeluar.update');
Route::get('/beritakeluar/{id}/print', 'BeritaKeluarController@print')->name('beritakeluar.print');
Route::get('/beritakeluar/{id}/print2', 'BeritaKeluarController@print2')->name('beritakeluar.print2');


Route::get('/users','UserController@index')->name('user.index');
Route::get('/users/tambah','UserController@create')->name('user.create');
Route::post('/users/store','UserController@store')->name('user.store');
Route::get('/users/{id}/edit','UserController@edit')->name('user.edit');
Route::put('/users/{id}/update','UserController@update')->name('user.update');  
Route::put('/users/{id}/updatepass','UserController@updatepass')->name('user.updatepass'); 
Route::get('/users/{id}','UserController@destroy')->name('user.destroy');  

Route::get('/rekapmasuk','RekapMasukController@index')->name('rekapmasuk.index');
Route::get('/rekapkeluar','RekapKeluarController@index')->name('rekapkeluar.index');

