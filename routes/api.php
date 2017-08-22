<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Tests Routes
Route::get('fetchTests', ['uses' => 'TestController@fetchTests']);
Route::resource('tests', 'TestController');
// Questions Routes
Route::get('newQuestions/{id}', ['uses' => 'QuestionController@newQuestions']);
Route::get('fetchQuestions/{id}', ['uses' => 'QuestionController@fetchQuestions']);
Route::resource('questions', 'QuestionController');
// Answers Routes
Route::get('updateAnswer/{id}', ['uses' => 'AnswerController@updateAnswer']);
Route::get('showAnswers', ['uses' => 'AnswerController@showAnswers']);
Route::get('fetchAnswer', ['uses' => 'AnswerController@fetchAnswer']);
Route::resource('answers', 'AnswerController');
