<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
	protected $fillable = ['test_name', 'intro', 'conclusion', 'intro_image', 'user_id'];

	public $timestamps = true;

	/**
	 *
	 * Retrieve owner of the test
	 *
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	/**
	 *
	 * Retrieve all questions for the test
	 *
	 */
	public function questions()
	{
		return $this->hasMany('App\Question');
	}

	/**
	 *
	 * Retrieve answers throuth the questions for the test
	 *
	 */
	public function answers()
    {
        return $this->hasManyThrough('App\Answer', 'App\Question','test_id', 'question_id');
    }
}
