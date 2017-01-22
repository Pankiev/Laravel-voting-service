<?php

namespace App\Http\Controllers;

use App\Question;
use App\QuestionsAnswer;
use App\UsersAnswer;
use Illuminate\Http\Request;

class UsersAnswersController extends Controller
{
    public function index()
    {

    }

    public function store($userId, Request $request)
    {
        $userAnswer = new UsersAnswer();
        $answerId = $request->input('votedAnswer');
        $userAnswer->setAttribute('user_id', $userId);
        $userAnswer->setAttribute('answer_id', $answerId);
        $userAnswer->save();
        $questionId = QuestionsAnswer::find($answerId)->getAttribute('question_id');

        return redirect('questions/'.$questionId);
    }

}
