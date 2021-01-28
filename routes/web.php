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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

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

