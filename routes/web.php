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

Route::get('/about', function () {
    return view('about');
});

Route::get('/help', function () {
    return view('help');
});
Route::get('/makanan', function () {
    return view('makanan');
});

Route::get('/makanan', 'MakananController@index');
Route::get('/makanan/create', 'MakananController@create')->name('makanan.create');
Route::post('/makanan', 'MakananController@store')->name('makanan.store');
Route::get('/makanan/edit/{id}', 'MakananController@edit')->name('makanan.edit');
Route::post('/makanan/update/{id}', 'MakananController@update')->name('makanan.update');
Route::post('/makanan/delete/{id}', 'MakananController@destroy')->name('makanan.destroy');
Route::get('/makanan/search','MakananController@search')->name('makanan.search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/daftarmakanan', 'HomeController@daftarmakanan');