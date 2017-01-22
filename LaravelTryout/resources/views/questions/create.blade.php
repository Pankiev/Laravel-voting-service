@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create new question</div>
                    <div class="panel-body">
                        {!! Form::open(array('url' => url('/questions'), 'class' => 'form-horizontal')) !!}
                        <div class="form-group">
                            {!! Form::label('content', 'Question', array('class' => 'col-md-4 control-label')) !!}
                            <div class="col-md-6">
                                {!! Form::text('content', '', array('class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                            {!! Form::submit('Create', array('class' => 'btn btn-primary')) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection