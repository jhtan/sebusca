@extends('layouts.default')
@section('content')
    <div class="col-md-4">


        <h4>Iniciar sesión</h4>
        {{Form::open(['route'=>'sessions.store'])}}
        <div class="form-group">
            {{ Form::label('email','Correo Electrónico:')}}
            {{ Form::email('email')}}
            <script>
                $('#email').addClass('form-control');
            </script>
        </div>
        <div class="form-group">
            {{ Form::label('password', 'Contraseña:')}}
            {{ Form::password('password') }}
            <script>
                $('#password').addClass('form-control');
            </script>
        </div>
        {{ Form::submit('Login', array('class'=>'btn btn-success')) }}
        {{Form::close() }}
    </div>
@stop
