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
Route::post('/producten', 'ProductController@filter');
Route::get('/producten/{product}', 'ProductController@show');
Route::get('/gebruikers/{user}/orders/{order}', 'OrderController@show');

Route::group(['prefix' => '/admin', 'middleware' => 'admin'], function() {
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
	Route::get('categorieen/{category}/aanpassen', 'CategoryController@edit');
	Route::patch('categorieen/{category}', ['as' => 'admin.categorieen.update', 'uses' => 'CategoryController@update']);
	Route::post('categorieen/verwijder', 'CategoryController@destroy');
	//Users
	Route::get('gebruikers', 'UserController@index');
	Route::get('gebruikers/aanmaken', 'UserController@create');
	Route::post('gebruikers/opslaan', 'UserController@store');
	Route::get('gebruikers/{user}/aanpassen', 'UserController@edit');
	Route::patch('gebruikers/{user}', ['as' => 'admin.gebruikers.update', 'uses' => 'UserController@update']);
	Route::post('gebruikers/verwijder', 'UserController@destroy');
	//Orders
	Route::get('orders', 'OrderController@index');
	Route::get('orders/aanmaken', 'OrderController@create');
	Route::post('orders/opslaan', 'OrderController@store');
	Route::get('orders/{order}/aanpassen', 'OrderController@edit');
	Route::patch('orders/{order}', ['as' => 'admin.orders.update', 'uses' => 'OrderController@update']);
	Route::post('orders/verwijder', 'OrderController@destroy');
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
