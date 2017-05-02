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

Route::get('/uppercase/{word}', 'HomeController@uppercase');

Route::get('/increment/{number?}','HomeController@increment');
	
Route::get('posts', 'PostsController@show');

Route::get('posts', 'PostsController@index');

Route::get('students', 'StudentsController@edit');

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
	$user = new \App\User();
	$user->name = 'Todd';
	$user->email = 'hendricks.ta@gmail.com';
	$user->password = 'password';
	$user->save();


   $post = new \App\Models\Post();
   $post->title = 'My first post';
   $post->content = 'Content test';
   $post->url = 'http://codeup.com';
   $post->created_by = 1;
   $post->save();	

});

