@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="col-md-8 col-md-offset-2" href="{{url('questions/create')}}">Create new question</a>
        <div class="col-md-8 col-md-offset-2">
        </div>
            <div class="col-md-8 col-md-offset-2">
                <h2>{{$question->content}}</h2>
            </div>
        </div>
    </div>
@endsection