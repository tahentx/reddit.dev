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

use App\Models\Post;
use App\User;

// Basic Routes

Route::get('/', 'PostsController@index');	
Route::get('posts', 'PostsController@show');
Route::get('posts/{id}/edit','PostsController@edit');
Route::resource('students', 'StudentsController');
Route::resource('posts', 'PostsController');

// Authentication Routes

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration Routes

Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

// Search 

Route::get('/search',function(){
    $q = Input::get ( 'q' );
    $post = User::where('title','LIKE','%'.$q.'%')->orWhere('content','LIKE','%'.$q.'%')->get();
    if(count($post) > 0){
        return view('/search')->withDetails($post)->withQuery ( $q );
    } else {
    	return view ('/search')->withMessage('No posts found. Maybe this is something you should write about!');
    }
});

Route::get('orm-test', function ()
{
	$post = \App\Models\Post::find(1);
	$post->title = "New Title Goes Here.";
	$post->save();
	return $post;
});

