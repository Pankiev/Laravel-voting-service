<?php

/*
|--------------------------------------------------------------------------
| web routes
|--------------------------------------------------------------------------
|
| this file is where you may define all of the routes that are handled
| by your application. just tell laravel the uris it should respond
| to using a closure or controller method. build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('users', ['uses' => 'UsersController@index']);
Route::get('users/create', ['uses' => 'UsersController@create']);
Route::post('users', ['uses' => 'UsersController@store']);
*/
Route::resource('users', 'UsersController', ['except' => ['store', 'update']]);

Auth::routes();

Route::get('/home', 'HomeController@index');
