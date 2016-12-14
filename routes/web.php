<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lenses', 'LensController@index')->name('lenses.index');
Route::get('/lenses/create', 'LensController@create')->name('lenses.create');
Route::post('/lenses', 'LensController@store')->name('lenses.store');
Route::get('/lenses/{lens}', 'LensController@show')->name('lenses.show');
Route::get('/lenses/{lens}/edit', 'LensController@edit')->name('lenses.edit');
Route::put('/lenses/{lens}', 'LensController@update')->name('lenses.update');
Route::delete('/lenses/{lens}', 'LensController@destroy')->name('lenses.destroy');
