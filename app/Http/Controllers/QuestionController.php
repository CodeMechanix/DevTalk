<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use Illuminate\Support\Str;


class QuestionController extends Controller
{
    public function index()
    {
    	$questions = Question::latest()->paginate(5);
    	return view('questions.index', compact('questions'));
    }
}
