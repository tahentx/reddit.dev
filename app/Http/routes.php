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
	
Route::resource('posts', 'PostsController');

Route::resource('students', 'StudentsController');

    
// Route::get('/rolldice/{number}', function($number){
// 	$randomNumber =  random_int(1, 6);
// 	return view('roll-dice',['number'=>$number, 'randomNumber'=>$randomNumber]);
// 	if ($randomNumber === $number) {
// 		return "Great guess!";
// 	} else{
// 		return "Keep trying";
// 	}
// });
