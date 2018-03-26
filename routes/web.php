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
Route::get('/producten/{product}', 'ProductController@show');/*
<<<<<<< HEAD
Route::post('products/delete', 'ProductController@destroy');
Route::resource('products','ProductController');

Route::get('/registreren', 'RegistrationController@create');
Route::post('/registreren', 'RegistrationController@store');

Route::get('/inloggen', 'SessionsController@create');
/*Auth::routes();
=======*/
Route::group(['prefix' => '/admin'], function() {
	Route::get('/', 'AdminController@index');
	//Products
	Route::get('/producten','AdminController@products');
	Route::get('producten/aanmaken', 'ProductController@create');
	Route::post('producten/opslaan', 'ProductController@store');
	Route::get('producten/{product}/aanpassen', 'ProductController@edit');
	Route::patch('producten/{product}', ['as' => 'admin.producten.update', 'uses' => 'ProductController@update']);
	Route::post('products/verwijder', 'ProductController@destroy');
	//Categories
});

/* User */
Route::get('/inloggen', 'SessionsController@create');
Route::post('/inloggen', 'SessionsController@store');
Route::get('/uitloggen', 'SessionsController@destroy');

Route::get('/registreren', 'RegistrationController@create');
Route::post('/registreren', 'RegistrationController@store');

Route::get('/account', 'RegistrationController@show');
//Route::resource('producten','ProductController');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*>>>>>>> e2a882ae84ea8e7722119b3bcb90abac64bba44b*/
