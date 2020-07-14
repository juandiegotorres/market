<?php


Route::get('/', 'TestController@bienvenida');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@show');

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

});

