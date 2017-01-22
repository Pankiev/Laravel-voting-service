@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="col-md-8 col-md-offset-2" href="{{url('questions/create')}}">Create new question</a>
        <div class="col-md-8 col-md-offset-2">
            <h2>Questions</h2>
        </div>
        <div class="row">
            @foreach($questions as $question)
                <div class="col-md-8 col-md-offset-2">
                    {{$question->content}}@break
                </div>
            @endforeach
        </div>
    </div>


@endsection