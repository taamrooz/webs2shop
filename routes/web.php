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
    return view('home');
});

Route::get('/producten', 'ProductController@index');
Route::get('/producten/{product}', 'ProductController@show');
Route::post('products/delete', 'ProductController@destroy');
Route::resource('products','ProductController');
