<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('book', 'BookController');

Route::get('/loan/{id}', 'BookController@loan')->name('loan');

Route::get('/devolution/{id}', 'BookController@devolution')->name('devolution');