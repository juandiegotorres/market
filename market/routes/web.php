<?php


Route::get('/', 'TestController@bienvenida');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
