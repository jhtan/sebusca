@extends('layouts.default')
@section('content')
  <h1>Registrarse</h1>

{{ Form::open( ['route' => 'users.store'] ) }}
    <div>
      {{ Form::label('username', 'Nombre de usuario: ') }}
      {{ Form::text('username') }}
      {{ $errors->first('username', ':O   :message') }}
    </div>
    <div>
      {{ Form::label('email', 'Correo electrónico: ') }}
      {{ Form::text('email') }}
      {{ $errors->first('email', ':P   :message') }}
    </div>
    <div>
      {{ Form::label('password', 'Contraseña: ') }}
      {{ Form::password('password') }}
      {{ $errors->first('password') }}
    </div>
    <div>{{ Form::submit('Registrarse') }}</div>
  {{ Form::close() }}
@stop