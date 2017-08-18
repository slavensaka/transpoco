<?php

namespace App\Http\Controllers;

use App\User;
use App\Test;
use App\Question;
use App\Answer;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
    	return view('welcome');
    }
}
