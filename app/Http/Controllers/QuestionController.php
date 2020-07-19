<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use Illuminate\Support\Str;



class QuestionController extends Controller
{
    public function index()
    {
        // Start Query Log
        // \DB::enableQueryLog();

        // Lazy Load
    	// $questions = Question::latest()->paginate(5);

    	// Eager Load
    	$questions = Question::with('user')->latest()->paginate(5);

    	 return view('questions.index', compact('questions'));

        // Check Query Log
    	// view('questions.index', compact('questions'))->render();

    	// End Query Log
    	// dd(\DB::getQueryLog());
    }
}
