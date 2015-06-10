@extends('layouts.default')
@section('content')
    <style>
        .timeline {
            position: relative;
            padding: 21px 0px 10px;
            margin-top: 4px;
            margin-bottom: 30px;
        }

        .timeline .line {
            position: absolute;
            width: 4px;
            display: block;
            background: currentColor;
            top: 0px;
            bottom: 0px;
            margin-left: 30px;
        }

        .timeline .separator {
            border-top: 1px solid currentColor;
            padding: 5px;
            padding-left: 40px;
            font-style: italic;
            font-size: .9em;
            margin-left: 30px;
        }

        .timeline .line::before {
            top: -4px;
        }

        .timeline .line::after {
            bottom: -4px;
        }

        .timeline .line::before,
        .timeline .line::after {
            content: '';
            position: absolute;
            left: -4px;
            width: 12px;
            height: 12px;
            display: block;
            border-radius: 50%;
            background: currentColor;
        }

        .timeline .panel {
            position: relative;
            margin: 10px 0px 21px 70px;
            clear: both;
        }

        .timeline .panel::before {
            position: absolute;
            display: block;
            top: 8px;
            left: -24px;
            content: '';
            width: 0px;
            height: 0px;
            border: inherit;
            border-width: 12px;
            border-top-color: transparent;
            border-bottom-color: transparent;
            border-left-color: transparent;
        }

        .timeline .panel .panel-heading.icon * {
            font-size: 20px;
            vertical-align: middle;
            line-height: 40px;
        }

        .timeline .panel .panel-heading.icon {
            position: absolute;
            left: -59px;
            display: block;
            width: 40px;
            height: 40px;
            padding: 0px;
            border-radius: 50%;
            text-align: center;
            float: left;
        }

        .timeline .panel-outline {
            border-color: transparent;
            background: transparent;
            box-shadow: none;
        }

        .timeline .panel-outline .panel-body {
            padding: 10px 0px;
        }

        .timeline .panel-outline .panel-heading:not(.icon),
        .timeline .panel-outline .panel-footer {
            display: none;
        }
        @media (min-width: 768px) {
            .panel-body img{
                width:80%;
            }
        }
        @media (min-width: 992px) {
            .panel-body img{
                width:70%;
            }
        }
        @media (min-width: 1200px) {
            .panel-body img{
                width:40%;
            }
        }
    </style>
    <div class="container">
        <div class="page-header">
            @foreach($lost as $n)
                @if($n->id==$_GET['id'])
                    <h2>Reportes de {{$n->name}} {{$n->last_name}}</h2>
                @endif
            @endforeach
        </div>
        <!-- Timeline -->
        <div class="timeline">
            <div class="line text-muted"></div>
            <a href="/seenPeople/create?id={{$_GET['id']}}">
            <article class="panel panel-default">
                <div class="panel-heading icon">
                    <i class="fa fa-plus"></i>
                </div>
                <div class="panel-body">
                    Añadir nuevo reporte
                </div>
            </article>
            </a>

            @foreach ($seenPeople as $reports)
                @if($reports->losts_id==$_GET['id'])
                    <!--report-->
                    <div class="separator text-muted">
                        <time datetime="{{$reports->date}}">{{ date('d M Y, H:i', strtotime($reports->date)) }} </time>
                    </div>
                    <article class="panel panel-{{$reports->type=='success'?'success':'primary'}}">
                        <div class="panel-heading icon">
                            <i class="fa fa-{{$reports->type=='success'?'check':'info'}}"></i>
                        </div>
                        <div class="panel-heading">
                                <h2 class="panel-title">{{$reports->type=='success'?'Encontrado':'Visto'}}</h2>
                        </div>
                        <div class="panel-body">
                            {{$reports->description}}
                        </div>
                        <div class="panel-footer">
                            posted by
                            @foreach($user as $user_f)
                                @if($user_f->id==$reports->user_id)
                                    <a href="/users/{{$user_f->username}}"><em>{{$user_f->username}}</em></a>
                                @endif
                                <!--revisar-->
                            @endforeach
                        </div>
                    </article>
                    <!--image Photos-->
                @if($reports->photo_url!='null')
                
                        <article class="panel panel-default panel-outline">
                            <div class="panel-heading icon">
                                <i class="fa fa-picture-o"></i>
                            </div>
                            <div class="panel-body">
                                <img src="{{'/'. $reports->photo_url}}" alt="photo{{$reports->id}}" class="img-responsive img-rounded">
                            </div>
                        </article>
                @endif
                    <!--/image Photos-->
                    <!--image Maps-->
                    <article class="panel panel-default panel-outline">
                        <div class="panel-heading icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="panel-body">
                            <img src="{{asset('images/map.jpg')}}" alt="map{{$reports->id}}" class="img-responsive img-rounded">
                        </div>
                    </article>
                    <!--/image Maps-->
                    <!--/report>-->
                @endif
            @endforeach

            <article class="panel panel-info panel-outline">
                <div class="panel-heading icon">
                    <i class="fa fa-info"></i>
                </div>
                <div class="panel-body">
                    Seen People reports for @foreach($lost as $n)
                        @if($n->id==$_GET['id'])
                            {{$n->name}} {{$n->last_name}}
                        @endif
                    @endforeach
                </div>
            </article>
        </div>
        <!-- /Timeline -->
    </div>
@stop