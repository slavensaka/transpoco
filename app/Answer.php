<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

	protected $fillable = array('answer','correct');
	public $timestamps = false;

	public function question()
	{
		return $this->belongsTo('Dipl\Question');
	}
}
