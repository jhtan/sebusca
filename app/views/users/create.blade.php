@extends('layouts.default')
@section('content')
    <div class="col-md-4">
        <h1>Registrarse</h1>

        {{ Form::open( ['route' => 'users.store'] ) }}
        <div class="form-group">
            {{ Form::label('username', 'Nombre de usuario:') }}
            {{ Form::input('text','username',null,array('class'=>'form-control')) }}
            {{ $errors->first('username', ':O   :message') }}
        </div>
        <div clas="form-group">
            {{ Form::label('email', 'Correo electrónico: ') }}
            {{ Form::email('email',null,array('class'=>'form-control')) }}
            {{ $errors->first('email', ':P   :message') }}
        </div>
        <div class="form-group">
            {{ Form::label('password', 'Contraseña: ') }}
            {{ Form::password('password', array('class'=>'form-control')) }}
            {{ $errors->first('password') }}
            {{ Form::label('password', 'Repita Contraseña: ') }}
            {{ Form::password('password', array('class'=>'form-control')) }}
            {{ $errors->first('password') }}
        </div>
        <div class="form-group">{{ Form::submit('Registrarse',array('class'=>'btn btn-success')) }}</div>
        {{ Form::close() }}
    </div>
@stop
