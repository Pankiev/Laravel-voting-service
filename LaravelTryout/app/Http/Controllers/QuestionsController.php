<?php

namespace App\Http\Controllers;

use App\Question;
use App\QuestionsAnswer;
use App\UsersAnswer;
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
        $questionAnswers = QuestionsAnswer::where('question_id', '=', $questionId)->get();
        $didUserVote = $this->userVoted($questionId);
        $userAnswersToQuestion = $this->getQuestionAnswers($questionId);

        return view('questions.show', compact('question', 'questionAnswers', 'didUserVote', 'userAnswersToQuestion'));
    }

    private function userVoted($questionId): bool
    {
        if (Auth::check())
        {
            $questionAnswers = $this->getQuestionAnswers($questionId)->where('user_id', '=', Auth::user()->getAttribute('id'));
            return $questionAnswers->count() > 0;
        }
        return false;
    }


    private function getQuestionId($answer_id): int
    {
        return QuestionsAnswer::find($answer_id)->getAttribute('question_id');
    }

    private function getQuestionAnswers($questionId)
    {
        return \DB::table('users_answers')
            ->join('questions_answers', 'users_answers.answer_id', '=', 'questions_answers.id')
            ->join('questions', 'questions.id', '=', 'questions_answers.question_id')
            ->select('users_answers.*', 'questions.id as question_id', 'questions_answers.answer')
            ->where('questions.id', '=', $questionId)
            ->get();
    }
}
