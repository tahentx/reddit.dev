<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|---------------- ----------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PostsController@index');	
Route::get('posts', 'PostsController@show');
Route::get('posts', 'PostsController@index');
Route::resource('students', 'StudentsController');
Route::resource('posts', 'PostsController');

// Authentication Routes

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration Routes

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('orm-test', function ()
{
	$post = \App\Models\Post::find(1);
	$post->title = "New Title Goes Here.";
	$post->save();
	return $post;
});

