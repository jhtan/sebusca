@extends('layouts.default')
@section('content')
  <h1>Login</h1>
  {{ Form::open(['route' => 'sessions.store']) }}
    <div>
    {{ Form::label('email', 'Correo Electrónico:')}}
    {{ Form::email('email') }}
    </div>

    <div>
      {{ Form::label('password', 'Contraseña:')}}
      {{ Form::password('password') }}
    </div>

    <div>{{ Form::submit('Login') }}</div>
  {{ Form::close() }}
@stop