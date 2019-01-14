<?php

use Illuminate\Http\Request;

Route::get('/users', 'UserController@index');

Route::put('/user/{id}', 'UserController@update');

Route::delete('/user/{id}', 'UserController@destroy');

Route::post('/user', 'UserController@signUp');

Route::post('/signin ', 'UserController@signIn');