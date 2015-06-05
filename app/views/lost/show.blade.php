@extends('layouts.default')
@section('content')

    <style>
        .container1 {
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
            width:500px;
            height: 860px;
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
    <div class="container1">
        <h1 class="missingTitle">MISSING</h1>
        <div class="content">
            <div class="thumbnail">
                <img src="{{asset('images/walt_missing_poster.jpg')}}" alt="Missing" class="missingImg">
            </div>
            <h3>{{$lost->name}} {{$lost->last_name}}</h3>
            <h4>Missing Since: dd mmm yyyy</h4>
            <div class="wrapp">
                <div class="col-md-3 right">
                    MISSING FROM:
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
                    AGE AT DISAPPEARANCE:
                </div>
                <div class="col-md-3 left">
                    {{$lost->date_of_birth}}
                </div>
                <div class="col-md-3 right">
                    RACE:
                </div>
                <div class="col-md-3 left">
                    {{$lost->race}}
                </div>
                <div class="col-md-3 right">
                    HEIGHT:
                </div>
                <div class="col-md-3 left">
                    {{$lost->height}}
                </div>
                <div class="col-md-3 right">
                    HAIR:
                </div>
                <div class="col-md-3 left">
                    {{$lost->hair}}
                </div>
                <div class="col-md-3 right">
                    WEIGHT:
                </div>
                <div class="col-md-3 left">
                    {{$lost->weight}}
                </div>
                <div class="col-md-3 right">
                    EYES:
                </div>
                <div class="col-md-3 left">
                    {{$lost->eyes}}
                </div>
                <div class="col-md-3 right">
                    MANNERISMS:
                </div>
                <div class="col-md-3 left">
                    {{$lost->mannerisms}}
                </div>
                <div class="col-md-3 right">
                    IDENTIFYING MARKS:
                </div>
                <div class="col-md-3 left">
                    {{$lost->identifying_marks}}
                </div>
                <div class="col-md-3 right">
                    CLOTHING OR JEWELRY:
                </div>
                <div class="col-md-3 left">
                    {{$lost->jewerly}}
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
                    {{$lost->description}}
                </p>
                <p>
                  <!--  <strong>If you have any information about XXXXXXXXX’s whereabouts, please contact:</strong>-->
                </p>
            </div>
            <div class="col-md-6">
                <!--<strong>XXXXX Police Service</strong>-->
                <strong>267788 Police Service</strong>
                <br> {{$lost->contact_number}} Contact Number
            </div>
            <!--<div class="col-md-6">
                <strong>Crime Stoppers</strong>
                <br> 1-800-222-TIPS (8477)
            </div>-->
        </div>
    </div>
    <a href="/seenPeople/create?id={{$lost->id}}"><button class="btn btn-primary">Reportar Vista</button></a>
    <a href="/seenPeople/show?id={{$lost->id}}"><button class="btn btn-primary">Ver reportes</button></a>
@stop