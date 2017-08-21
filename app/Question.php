<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

	protected $fillable = array('question','points','test_id');

	public function answers()
	{
		return $this->hasMany('App\Answer');
	}

	public function test()
	{
		return $this->belongsTo('App\Test');
	}
}
