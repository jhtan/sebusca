@extends('layouts.default')
@section('content')
    <div class="col-md-4">
        {{$_GET['id']}}
        <h1>Reporte de Personsa Desaparecida</h1>
        {{ Form::open( ['route' => 'seenPeople.store'] ) }}

        {{Form::select('type', array('success' => 'Encontrado', 'primary' => 'Visto'), 'primary',array('data-toggle'=>'select','class'=>'form-control select select-default'))}}
        <div class="form-group">
            {{ Form::label('date', 'Fecha del reporte:') }}
            {{ Form::input('text','date',null,array('placeholder'=>'En caso de ser hoydia el reporte dejarlo en blanco','class'=>'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('description', 'Descripción:') }}
            {{ Form::textarea('description',null,array('placeholder'=>'Escriba una descripción del reporte','class'=>'form-control')) }}
        </div>
        <div clas="form-group">
            {{ Form::label('losts_id', 'Id del Desparacido: ') }}
            {{ Form::input('hidden','losts_id',$_GET['id'],array('class'=>'form-control', 'hidden'=>'true')) }}
        </div>
        <div class="form-group">
        </div>
        <div class="form-group">
            {{ Form::submit('Reportar Vista',array('class'=>'btn btn-success')) }}
        </div>
        {{ Form::close() }}
    </div>
    <script>
        $(document).ready(function() {
            $('select[name="type"]').select2({dropdownCssClass: 'select-inverse-dropdown'});
        });
    </script>
@stop
