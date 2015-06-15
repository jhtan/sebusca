@extends('layouts.default')
@section('content')

    <style>
        .container1 {
            height: auto;
            border: 2px solid red;
            border-radius: 10px;
        }
        .missingTitle {
            color: red;
            font-family: 'georgia';
            font-size: 100px;
            font-weight: bold;
            text-align: center;
        }
        .thumbnail img{
            max-width:300px;
            max-height: 500px;
        }

        .content {
            width:100%;
            height: auto;
            margin: 0 auto;
            text-align: center;
        }

        dt,
        dd {
            text-align: left;
        }

        .dl-horizontal dt {
            min-width: 300px;
            margin-left: 0;
        }

        .left {
            text-align: left;
        }

        .right {
            font-weight: bold;
            text-align: right;
        }

        .wrapp {
            padding: 50px;
        }
    </style>
    <a href="/seenPeople/create?id={{$lost->id}}"><button class="btn btn-primary">Reportar Vista</button></a>
    <a href="/seenPeople/show?id={{$lost->id}}"><button class="btn btn-primary">Ver reportes</button></a>

    @if(Auth::check() and Auth::Id()==6 )

    {{ Form::open( ['route' => 'state.store'])}}
    {{ Form::input('hidden','lost_id',$lost->id,array('class'=>'form-control')) }}
    {{ Form::submit('Persona Encontrada', array('class'=>'btn btn-primary')) }}
    {{ Form::close() }}
    @endif

    <div class="container1">
        @if($lost->sex=='Femenino')
        <h1 class="missingTitle">Desaparecida</h1>
        @else
            <h1 class="missingTitle">Desaparecido</h1>
        @endif
        <div class="content">
            <div class="thumbnail">
                <img src="/{{$lost->photo_url}}" alt="Missing" class="missingImg">
            </div>
            <h3>{{$lost->name}} {{$lost->last_name}}</h3>
            <h4>Desaparecio el: {{$lost->missing_sincedate}}</h4>
            <div class="wrapsp">
                <div class="col-md-3 right">
                    Desaparecio en:
                </div>
                <div class="col-md-3 left">
                    <!--CITY, PROVINCE-->
                    La Paz
                </div>
                <div class="col-md-3 right">
                    SEX:
                </div>
                <div class="col-md-3 left">
                    {{$lost->sex}}
                </div>
                <div class="col-md-3 right">
                    Edad en la desaparición:
                </div>
                <div class="col-md-3 left">
                    {{$lost->age}}
                </div>
                <div class="col-md-3 right">
                    Altura:
                </div>
                <div class="col-md-3 left">
                    {{$lost->height}} mts
                </div>
                <div class="col-md-3 right">
                    Cabello:
                </div>
                <div class="col-md-3 left">
                    {{$lost->hair}}
                </div>
                <div class="col-md-3 right">
                    Peso:
                </div>
                <div class="col-md-3 left">
                    {{$lost->weight}} Kg
                </div>
                <div class="col-md-3 right">
                    Ojos:
                </div>
                <div class="col-md-3 left">
                    {{$lost->eyes}}
                </div>
                <div class="col-md-3 right">
                    <!--BUILDing:-->
                    Country:
                </div>

                <div class="col-md-3 left">
                    <!--{{$lost->conttry_id}}-->
                    Bolivia
                </div>
            </div>
            <div class="col-lg-12">
                <p style="text-align:center;">
                    {{$lost->missing_place}},
                    {{$lost->clothing}},
                    {{$lost->description}}
                </p>
                <p>
                  <!--  <strong>If you have any information about XXXXXXXXX’s whereabouts, please contact:</strong>-->
                </p>
            </div>
            <p style="text-align:center:">
                <!--<strong>XXXXX Police Service</strong>-->
                <br> {{$lost->contact_number}} Nro. de contacto
            </p>
            <!--<div class="col-md-6">
                <strong>Crime Stoppers</strong>
                <br> 1-800-222-TIPS (8477)
            </div>-->
        </div>
    </div>

@stop