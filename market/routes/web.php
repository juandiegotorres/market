<?php


Route::get('/', 'TestController@bienvenida');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
	//PRODUCTOS
	Route::get('/products', 'ProductController@index'); //listar 
	Route::get('/products/create', 'ProductController@create'); //formulario
	Route::post('/products', 'ProductController@store'); //registrar los datos
	Route::get('/products/{id}/edit', 'ProductController@edit');
	Route::post('/products/{id}/edit', 'ProductController@update');
	Route::delete('/products/{id}', 'ProductController@destroy');
	//IMAGENES DE PRODUCTOS
	Route::get('/products/{id}/images', 'ImageController@index');// Muestra listado de imagenes segun el producto
	Route::post('/products/{id}/images', 'ImageController@store');
	Route::delete('/products/{id}/images', 'ImageController@destroy');
});

