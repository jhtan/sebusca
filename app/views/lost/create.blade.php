@extends('layouts.default')
@section('content')
    <div class="col-md-4">
        <h3>Reportar Desaparecido</h3>

        {{ Form::open( ['route' => 'lost.store'] ) }}
        <div class="form-group">
            {{ Form::label('name', 'Nombres:')}}
            {{ Form::input('text', 'name', null, array('class'=>'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('last_name', 'Apellidos:')}}
            {{ Form::input('text', 'last_name', null, array('class'=>'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('document_number', 'Número de documento:')}}
            {{ Form::input('text', 'document_number', null, array('class'=>'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('date_of_birth', 'Fecha de nacimiento:')}}
            {{ Form::input('text', 'date_of_birth', null, array('class'=>'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('clothing', 'Vestimenta:')}}
            {{ Form::input('text', 'clothing', null, array('class'=>'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('nationality', 'Nacionalidad:')}}
            {{ Form::input('text', 'nationality', null, array('class'=>'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Descripción:')}}
            {{ Form::input('text', 'description', null, array('class'=>'form-control')) }}
        </div>

        <div class="form-group">{{ Form::submit('Reportar', array('class'=>'btn btn-success')) }}</div>

        {{ Form::close() }}
    </div>
@stop