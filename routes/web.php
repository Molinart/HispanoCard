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

Route::get('/new_game', function () {
    return view('new');
});
Route::get('/', 'HomeController@index');

Route::post('/new_game/save', 'HomeController@newGame')->name('save');

Route::get('/jugar/{id}', 'HomeController@play')->name('play');

Route::get('/add/{id}/{game}', 'HomeController@add')->name('add-point');
Route::get('/loss/{id}/{game}', 'HomeController@loss')->name('loss-point');
