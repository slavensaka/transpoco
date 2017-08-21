<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
	// $answers = App\Question::find(28)->answers;
 //    	dd($answers);
    // return view('welcome');
// });

Route::get('/', 'TestController@index');


