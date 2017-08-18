<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
	protected $fillable = ['test_name', 'intro', 'conclusion', 'intro_image'];
	public $timestamps = true;

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function questions()
	{
		return $this->hasMany('App\Question');
	}

	public function answers()
    {
        return $this->hasManyThrough('App\Answer', 'App\Question','test_id', 'question_id');
    }
}
