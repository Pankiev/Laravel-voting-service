@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="col-md-8 col-md-offset-2" href="{{url('questions/create')}}">Create new question</a>
        <div class="col-md-8 col-md-offset-2">
        </div>
            <div class="col-md-8 col-md-offset-2">
                <h2>{{$question->content}}</h2>


                {!! Form::open(array('url' => url('users/'.$user->id.'/answers'), 'class' => 'form-horizontal')) !!}
                @foreach($questionAnswers as $questionAnswer)
                    <div class="col-md-8 col-md-offset-2">
                        <h4>
                            @if(!$didUserVote)
                                {{Form::radio('votedAnswer', $questionAnswer->id)}}
                            @endif
                            {{$questionAnswer->answer}}<br/>
                            votes: {{$userAnswersToQuestion->where('answer', '=', $questionAnswer->answer)->count()}}
                        </h4>
                    </div>
                @endforeach

                @if(!$didUserVote)
                    {!! Form::submit('Vote', array('class' => 'btn btn-primary')) !!}
                @elseif(!Auth::check())
                    <a href="{{url('login')}}">Log in</a> to vote
                @else
                    You can vote only once per question
                @endif
                {!! Form::close() !!}
            </div>
            @if(Auth::check() && $question->user_id == $user->id)
                <h3><a href="{{Request::url().'/answers/create'}}">Add new answer</a></h3>
            @endif
        </div>
    </div>
@endsection