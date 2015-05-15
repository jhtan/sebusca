@extends('layouts.default')
@section('content')
    <h1>Reportar Desaparecido</h1>

    {{ Form::open( ['route' => 'lost.store'] ) }}
    <div>
        {{ Form::label('name', 'Nombres:')}}
        {{ Form::text('name') }}
    </div>

    <div>
        {{ Form::label('last_name', 'Apellidos:')}}
        {{ Form::text('last_name') }}
    </div>

    <div>
        {{ Form::label('document_number', 'Número de documento:')}}
        {{ Form::text('document_number') }}
    </div>

    <div>
        {{ Form::label('date_of_birth', 'Fecha de nacimiento:')}}
        {{ Form::text('date_of_birth') }}
    </div>

    <div>
        {{ Form::label('clothing', 'Vestimenta:')}}
        {{ Form::text('clothing') }}
    </div>

    <div>
        {{ Form::label('nationality', 'Nacionalidad:')}}
        {{ Form::text('nationality') }}
    </div>

    <div>
        {{ Form::label('description', 'Descripción:')}}
        {{ Form::text('description') }}
    </div>
    <div>
        {{ Form::label('latitude', 'latitude:')}}
        {{ Form::text('latitude') }}
    </div>
    <div>
        {{ Form::label('longitude', 'longitude:')}}
        {{ Form::text('longitude') }}
    </div>

    <div>{{ Form::submit('Reportar') }}</div>
    {{ Form::close() }}
@stop