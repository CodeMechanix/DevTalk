<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use Illuminate\Support\Str;
use App\Http\Requests\AskQuestionRequest;



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

    public function create()
    {
        $question = new Question();

        return view('questions.create', compact('question'));
    }

    public function store(AskQuestionRequest $request)
    {
        $request->user()->questions()->create($request->only('title', 'body'));

        return redirect()->route('questions.index')->with('success', "Your question has been submitted");
    }

    public function edit(Question $question)
    {
        return view("questions.edit", compact('question'));
    }

    public function update(AskQuestionRequest $request, Question $question)
    {
        $question->update($request->only('title', 'body'));

        return redirect('/questions')->with('success', "Your question has been updated.");
    }
}
