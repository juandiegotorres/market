<?php

Route::get('/', 'WelcomeController@welcome');
Route::get('/test', 'WelcomeController@welcomeTest');
Route::get('/products', 'WelcomeController@show');


Auth::routes(['verify' => true]);


Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm'); 
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail'); 
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm'); 
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('/search', 'SearchController@show');
Route::get('/products/json', 'SearchController@data');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@show');
Route::get('/categories/{category}', 'CategoryController@show');

Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');
Route::post('/order', 'CartController@update');




Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
	//PRODUCTOS
	Route::get('/products', 'Admin\ProductController@index'); //listar 
	Route::get('/products/create', 'Admin\ProductController@create'); //formulario
	Route::post('/products', 'Admin\ProductController@store'); //registrar los datos
	Route::get('/products/{id}/edit', 'Admin\ProductController@edit');
	Route::post('/products/{id}/edit', 'Admin\ProductController@update');
	Route::delete('/products/{id}', 'Admin\ProductController@destroy');
	//IMAGENES DE PRODUCTOS
	Route::get('/products/{id}/images', 'Admin\ImageController@index');// Muestra listado de imagenes segun el producto
	Route::post('/products/{id}/images', 'Admin\ImageController@store');
	Route::delete('/products/{id}/images', 'Admin\ImageController@destroy');
	Route::get('/products/{id}/images/select/{image}', 'Admin\ImageController@select');
	//CATEGORIAS
	Route::get('/categories', 'Admin\CategoryController@index'); //listar 
	Route::get('/categories/create', 'Admin\CategoryController@create'); //formulario
	Route::post('/categories', 'Admin\CategoryController@store'); //registrar los datos
	Route::get('/categories/{category}/edit', 'Admin\CategoryController@edit');//formuolario edicion
	Route::post('/categories/{category}/edit', 'Admin\CategoryController@update');//actualizar
	Route::delete('/categories/{category}', 'Admin\CategoryController@destroy');//eliminar

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
