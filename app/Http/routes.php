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

Route::get('/uppercase/{'?'}', function () {
    if (!empty('?')){
    	strtoupper('?');
	} else {
    	return view('welcome');
	}
});

Route::get('/increment/{}', function () {
    
	while (i <= 10,) {
		# code...
	}
    return view('welcome');
});

Route::get('/add', function () {
    return view('welcome');
});

