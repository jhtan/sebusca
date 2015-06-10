@extends('layouts.default')
@section('content')
    <style>
        #filedrag
        {
            border: 3px dashed #3c3c3c;
            padding: 30px;
            display: none;
            font-weight: bold;
            font-size:22px;
            text-align: center;
            margin: 10px;
            border-radius: 7px;
            cursor: default;
        }

        #filedrag.hover
        {
            border-color:  #13202C;
            box-shadow: inset 0px 0px 10px 5px rgba(0,0,0,.3);
        }

        .photo
        {
            max-width: 30%;
        }
        #messages
        {
            padding: 0 10px;
            margin: 1em 0;
            border: 1px solid #999;
        }


    </style>

    <h1>Reporte de Persona Desaparecida</h1>
    {{ Form::open( ['route' => 'seenPeople.store',  'files' => true] ) }}
    <div class="col-md-4">

        {{Form::select('type', array('success' => 'Encontrado', 'primary' => 'Visto'), 'primary',array('data-toggle'=>'select','class'=>'form-control select select-default'))}}
        <!--<div class="form-group">
            {{ Form::label('date', 'Fecha del reporte:') }}
            {{ Form::input('text','date',null,array('placeholder'=>'En caso de ser hoydia el reporte dejarlo en blanco','class'=>'form-control')) }}
        </div>-->
        <div class="form-group">
            {{ Form::label('description', 'Descripción:') }}
            {{ Form::textarea('description',null,array('placeholder'=>'Escriba una descripción del reporte','class'=>'form-control')) }}
        </div>
        <div clas="form-group">
            {{ Form::input('hidden','losts_id',$_GET['id'],array('class'=>'form-control')) }}
        </div>
            <label>¿Tienes alguna fotografia?</label>
            {{ Form::file('image') }}
        <div class="form-group">
            {{Form::label('fileselect', 'Añadir fotos: (Maximo X MB)')}}
            {{Form::input('file','fileselect','null',array('class'=>'form-control','multiple'))}}
            <div id="filedrag">Arrastra y suelta tus <i class="fa fa-picture-o"></i> aqui!
            </div>

        </div>
    </div>
    <div class="col-md-8 well">
        <h4>YOUR MAP Jhtan</h4>
        <img src="{{asset('images/EckpQtqgWuA.jpg')}}">
    </div>
    <div class="col-md-12">
        <div id="messages" class="well">
        </div>
        <div class="form-group">
            {{ Form::submit('Reportar Vista',array('class'=>'btn btn-success')) }}
        </div>
    </div>
    {{ Form::close() }}
    <script type="text/javascript" src="{{asset('js/filedrag.js')}}"></script>
    <script>

        $('#file').on('change',function(){
            alert("hola");
        });
        $(document).ready(function() {
            $('select[name="type"]').select2({dropdownCssClass: 'select-inverse-dropdown'});
        });
    </script>
@stop
