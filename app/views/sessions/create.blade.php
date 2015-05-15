@extends('layouts.default')
@section('content')
    <div class="col-md-4">


        <h4>Login</h4>
        {{Form::open(['route'=>'sessions.store'])}}
        <div class="form-group">
            {{ Form::label('email','EmailAddress:')}}
            {{ Form::email('email')}}
            <script>
                $('#email').addClass('form-control');
            </script>
        </div>
        <div class="form-group">
            {{ Form::label('password', 'Password:')}}
            {{ Form::password('password') }}
            <script>
                $('#password').addClass('form-control');
            </script>
        </div>
        {{ Form::submit('Login') }}
        <button type="submit" class="btn btn-default">Submit</button>
        {{Form::close() }}
    </div>
@stop
