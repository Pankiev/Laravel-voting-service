<?php

namespace App\Http\Controllers;

use App\Question;
use App\QuestionsAnswer;
use Illuminate\Http\Request;

class QuestionsAnswersController extends Controller
{
    public function index($questionId)
    {
        dd(QuestionsAnswer::where('question_id', '=', $questionId));
    }

    public function create($questionId)
    {
        $question = Question::find($questionId);
        return view('questions.answers.create', compact('question'));
    }

    public function store($questionId, Request $request)
    {
        $answer = new QuestionsAnswer();
        $answer->setAttribute('question_id', $questionId);
        $answer->setAttribute('answer', $request->input('answer'));
        $answer->save();
        return redirect('questions/'.$questionId);
    }
}
