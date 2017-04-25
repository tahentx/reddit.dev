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

Route::get('/uppercase/{word}', function ($word) {
    	return strtoupper($word);
});

Route::get('/uppercase','HomeController@uppercase');

Route::get('/uppercase/{word}', function ($word){
	$data = [
	'word'=> $word,
	'uppercased'=> strtoupper($word),
	];
	return view('uppercase', $data);
});

Route::get('/increment', 'HomeController@increment');

Route::get('/increment/{number?}', function($number = 0) {
    $data = [];
    if(is_numeric($number)) {
        $data['number'] = $number + 1;
    } else {
        $data['number'] = $number . " is not a number and cannot be incremented.";
    }
    return view('increment', $data);
});
	
// Route::get('/rolldice/{number}', function($number){
// 	$randomNumber =  random_int(1, 6);
// 	return view('roll-dice',['number'=>$number, 'randomNumber'=>$randomNumber]);
// 	if ($randomNumber === $number) {
// 		return "Great guess!";
// 	} else{
// 		return "Keep trying";
// 	}
// });
