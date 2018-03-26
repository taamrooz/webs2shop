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

Route::resource('producten','ProductController');
Route::get('/producten', 'ProductController@index');
Route::get('/producten/{product}', 'ProductController@show');

Route::group(['prefix' => '/admin'], function() {
	Route::get('/', 'AdminController@index');
	//Products
	Route::get('producten','AdminController@products');
	Route::get('producten/aanmaken', 'ProductController@create');
	Route::post('producten/opslaan', 'ProductController@store');
	Route::get('producten/{product}/aanpassen', 'ProductController@edit');
	Route::patch('producten/{product}', ['as' => 'admin.producten.update', 'uses' => 'ProductController@update']);
	Route::post('products/verwijder', 'ProductController@destroy');
	//Categories
	Route::get('categorieen', 'CategoryController@index');
	Route::get('categorieen/aanmaken', 'CategoryController@create');
	Route::post('categorieen/opslaan', 'CategoryController@store');
	Route::get('categorieen/{product}/aanpassen', 'CategoryController@edit');
	Route::patch('categorieen/{product}', ['as' => 'admin.categorieen.update', 'uses' => 'CategoryController@update']);
	Route::post('products/verwijder', 'CategoryController@destroy');
});

/* User */
Route::get('/inloggen', 'SessionsController@create');
Route::post('/inloggen', 'SessionsController@store');
Route::get('/uitloggen', 'SessionsController@destroy');

Route::get('/registreren', 'RegistrationController@create');
Route::post('/registreren', 'RegistrationController@store');

Route::get('/account', 'RegistrationController@show');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
