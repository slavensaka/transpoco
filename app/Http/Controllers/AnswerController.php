<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

// PREBACI U QUESTIONS
    public function showAnswers(Request $request)
    {

    	$answers = Question::find($request->questionId)->answers;
    	return ['success' => true, 'data' => $answers];
    }

    public function updateAnswer(Request $request, $questionId)
    {
    	$answers = Question::find($questionId)->answers;
    	return ['success' => true, 'data' => $answers];
    }

    public function fetchAnswer(Request $request)
    {
    	$answerId = $request->all();
    	$answer = Answer::find($answerId);
    	return response()->json(['answer' => $answer]);
    }

    public function updateAnswers(Request $request)
    {
    	$answerId = $request->all();
    	$answer = Answer::find($answerId);
    	return response()->json(['answer' => $answer]);
    }

    public function fetchAnswers()
    {
    	$answers = Answer::all();
    	return $answers;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        $answer->update($request->activeAnswer);
        $question = $answer->question;
        return ['success' => true, 'question' => $question];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
    	$question = $answer->question;
        $answer->delete();
        return ['success' => true, 'question' => $question];
    }
}
