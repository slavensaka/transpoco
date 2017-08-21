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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('fetchTests', ['uses' => 'TestController@fetchTests']);
Route::resource('tests', 'TestController');
Route::get('fetchQuestions/{id}', ['uses' => 'QuestionController@fetchQuestions']);
Route::resource('questions', 'QuestionController');

Route::get('updateAnswer/{id}', ['uses' => 'AnswerController@updateAnswer']);

Route::get('showAnswers', ['uses' => 'AnswerController@showAnswers']);
Route::get('fetchAnswer', ['uses' => 'AnswerController@fetchAnswer']);
Route::get('fetchAnswers', ['uses' => 'AnswerController@fetchAnswers']);
Route::resource('answers', 'AnswerController');
