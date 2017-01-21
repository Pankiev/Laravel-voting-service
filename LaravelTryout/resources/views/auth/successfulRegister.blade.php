@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2>Registration successful</h2>
                        <h3>You may now
                            <a href="{{ url('/login') }}">log in</a>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection