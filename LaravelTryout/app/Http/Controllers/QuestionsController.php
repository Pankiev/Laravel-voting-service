<?php

namespace App\Http\Controllers;

use App\Question;
use App\QuestionsAnswer;
use Illuminate\Http\Request;
use \Auth;


class QuestionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $questions = Question::all();
        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        $question = new Question();
        $question->setAttribute('content', $request->input('content'));
        $question->setAttribute('user_id', Auth::user()->getAttribute('id'));
        $question->save();

        return redirect('questions/'.$question->getAttribute('id'));
    }

    public function show($questionId)
    {
        $question = Question::find($questionId);
        $questionAnswers = QuestionsAnswer::where('question_id', '=', $questionId);
        return view('questions.show', compact('question', 'questionAnswers'));
    }
}
