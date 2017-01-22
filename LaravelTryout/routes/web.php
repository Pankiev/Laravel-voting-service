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

Route::resource('users', 'UsersController', ['except' => ['store', 'update']]);
Route::resource('questions', 'QuestionsController');

Route::get('questions/create', 'QuestionsController@create')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index');
