<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
	protected $fillable = array('answer','correct', 'question_id');

	public $timestamps = false;

	/**
	 *
	 * Retrieve the question assigned to answer
	 *
	 */
	public function question()
	{
		return $this->belongsTo('App\Question');
	}
}
