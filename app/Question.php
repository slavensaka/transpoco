<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	protected $fillable = array('question','points','test_id');

	/**
	 *
	 * Retrieve all answers assign to this question
	 *
	 */
	public function answers()
	{
		return $this->hasMany('App\Answer');
	}
}
