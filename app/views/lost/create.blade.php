@extends('layouts.default')
@section('content')
    <link rel="stylesheet" href="{{asset('/css/leaflet.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap-datepicker.min.css')}}">

    <script src="{{asset('/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/bootstrap-datepicker.es.min.js')}}" type="text/javascript"></script>

            <style>
                .board {
                    width: 100%;
                    margin: 60px auto;
                    height: auto;
                    background: #fff;
                    /*box-shadow: 10px 10px #ccc,-10px 20px #ddd;*/
                }

                .board .nav-tabs {
                    position: relative;
                    /* border-bottom: 0; */
                    /* width: 80%; */

                    margin: 40px auto;
                    margin-bottom: 0;
                    box-sizing: border-box;
                }

                .board > div.board-inner {
                    background: #fafafa;
                    background-size: 30%;
                }

                p.narrow {
                    width: 60%;
                    margin: 10px auto;
                }

                .liner {
                    height: 2px;
                    background: #ddd;
                    position: absolute;
                    width: 80%;
                    margin: 0 auto;
                    left: 0;
                    right: 0;
                    top: 50%;
                    z-index: 1;
                }

                .nav-tabs > li.active > a,
                .nav-tabs > li.active > a:hover,
                .nav-tabs > li.active > a:focus {
                    color: #555555;
                    cursor: default;
                    /* background-color: #ffffff; */

                    border: 0;
                    border-bottom-color: transparent;
                }

                span.round-tabs {
                    width: 70px;
                    height: 70px;
                    line-height: 70px;
                    display: inline-block;
                    border-radius: 100px;
                    background: white;
                    z-index: 2;
                    position: absolute;
                    left: 0;
                    text-align: center;
                    font-size: 25px;
                }

                span.round-tabs.one {
                    color: rgb(34, 194, 34);
                    border: 2px solid rgb(34, 194, 34);
                }

                li.active span.round-tabs.one {
                    background: #fff !important;
                    border: 2px solid #ddd;
                    color: rgb(34, 194, 34);
                }

                span.round-tabs.two {
                    color: #febe29;
                    border: 2px solid #febe29;
                }

                li.active span.round-tabs.two {
                    background: #fff !important;
                    border: 2px solid #ddd;
                    color: #febe29;
                }

                span.round-tabs.three {
                    color: #3e5e9a;
                    border: 2px solid #3e5e9a;
                }

                li.active span.round-tabs.three {
                    background: #fff !important;
                    border: 2px solid #ddd;
                    color: #3e5e9a;
                }

                span.round-tabs.four {
                    color: #f1685e;
                    border: 2px solid #f1685e;
                }

                li.active span.round-tabs.four {
                    background: #fff !important;
                    border: 2px solid #ddd;
                    color: #f1685e;
                }

                span.round-tabs.five {
                    color: #999;
                    border: 2px solid #999;
                }

                li.active span.round-tabs.five {
                    background: #fff !important;
                    border: 2px solid #ddd;
                    color: #999;
                }

                .nav-tabs > li.active > a span.round-tabs {
                    background: #fafafa;
                }

                .nav-tabs > li {
                    width: 20%;
                }
                /*li.active:before {
                content: " ";
                position: absolute;
                left: 45%;
                opacity:0;
                margin: 0 auto;
                bottom: -2px;
                border: 10px solid transparent;
                border-bottom-color: #fff;
                z-index: 1;
                transition:0.2s ease-in-out;
                }*/

                li:after {
                    content: " ";
                    position: absolute;
                    left: 45%;
                    opacity: 0;
                    margin: 0 auto;
                    bottom: 0px;
                    border: 5px solid transparent;
                    border-bottom-color: #ddd;
                    transition: 0.1s ease-in-out;
                }

                li.active:after {
                    content: " ";
                    position: absolute;
                    left: 45%;
                    opacity: 1;
                    margin: 0 auto;
                    bottom: 0px;
                    border: 10px solid transparent;
                    border-bottom-color: #ddd;
                }

                .nav-tabs > li a {
                    width: 70px;
                    height: 70px;
                    margin: 20px auto;
                    border-radius: 100%;
                    padding: 0;
                }

                .nav-tabs > li a:hover {
                    background: transparent;
                }

                .tab-content {}

                .tab-pane {
                    position: relative;
                    padding-top: 50px;
                }

                .tab-content .head {
                    font-family: 'Roboto Condensed', sans-serif;
                    font-size: 25px;
                    text-transform: uppercase;
                    padding-bottom: 10px;
                }

                .btn-outline-rounded {
                    padding: 10px 40px;
                    margin: 20px 0;
                    border: 2px solid transparent;
                    border-radius: 25px;
                }

                .btn.green {
                    background-color: #5cb85c;
                    /*border: 2px solid #5cb85c;*/

                    color: #ffffff;
                }

                @media( max-width: 585px) {
                    .board {
                        width: 90%;
                        height: auto !important;
                    }
                    span.round-tabs {
                        font-size: 16px;
                        width: 50px;
                        height: 50px;
                        line-height: 50px;
                    }
                    .tab-content .head {
                        font-size: 20px;
                    }
                    .nav-tabs > li a {
                        width: 50px;
                        height: 50px;
                        line-height: 50px;
                    }
                    li.active:after {
                        content: " ";
                        position: absolute;
                        left: 35%;
                    }
                    .btn-outline-rounded {
                        padding: 12px 20px;
                    }
                }
            </style>
        </head>

        <body>
        @if(Auth::check())
        <section style="background:#efefe9;">
            <div class="container">
                <div class="row">
                    <div class="board">
                        <h2>Registrar Datos de la Persona desaparecida</h2>
                        <div class="board-inner">
                            <ul class="nav nav-tabs" id="myTab">
                                <div class="liner"></div>
                                <li class="active">
                                    <a href="#missing" data-toggle="tab" title="Datos de la Persona Desaparecida">
                                        <span class="round-tabs one"><i class="fa fa-user"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#photo" data-toggle="tab" title="Agregar fotografía">
                                        <span class="round-tabs two"><i class="fa fa-camera"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#details" data-toggle="tab" title="Detalles de la desaparición">
                                        <span class="round-tabs three"><i class="fa fa-pencil-square-o"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#maploc" data-toggle="tab" title="Ubicar en el mapa">
									    <span class="round-tabs four"><i class="fa fa-map-marker"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#finished" data-toggle="tab" title="completed">
																		<span class="round-tabs five">
															<i class="fa fa-check"></i>
												 </span> </a>
                                </li>
                            </ul>
                        </div>
                        {{ Form::open( ['route' => 'lost.store' , 'files'=> true])}}
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="missing">
                                <h3 class="head text-center">Datos de la persona desaparecida</h3>
                                <p class="narrow text-center">
                                <div class="form-group">
                                    {{ Form::label('name', 'Nombres:')}}
                                    {{ Form::input('text', 'name', null, array('class'=>'form-control' ,'Placeholder'=>'Ej. Juan Carlos')) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('last_name', 'Apellidos:')}}
                                    {{ Form::input('text', 'last_name', null, array('class'=>'form-control', 'placeholder'=>'Ej. Perez Mamani')) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('document_number', 'Carnet de Identidad (CI): ')}}
                                    {{ Form::input('text', 'document_number', null, array('class'=>'form-control', 'placeholder'=>'Ej. 6543456')) }}
                                </div>

                                <div class="form-group" id="date">
                                    {{ Form::label('date_of_birth', 'Fecha de nacimiento:')}}
                                    <div class="input-group date">
                                    {{ Form::input('text', 'date_of_birth', null, array('class'=>'form-control')) }}<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                                <script>
                                    $('#date .input-group.date').datepicker({
                                        language: "es",
                                        autoclose: true,
                                        todayHighlight: true,
                                        toggleActive: true
                                    });
                                </script>
                                <div class="form-contgrol">
                                    {{ Form::label('age', 'Edad: ')}}
                                    {{ Form::input('number', 'age', null, array('class'=>'form-control', 'placeholder'=>'Ej. 18')) }}
                                </div>
                                <div class="form-contgrol">
                                    {{ Form::label('sex', 'Sexo: ')}}
                                    {{Form::select('sex', array('Masculino' => 'Masculino', 'Femenino' => 'Femenino'), 'primary',array('data-toggle'=>'select','class'=>'form-control select select-default'))}}
                                </div>
                                <div class="form-contgrol">
                                    {{ Form::label('height', 'Altura: ')}}
                                    {{ Form::input('text', 'height', null, array('class'=>'form-control', 'placeholder'=>'Ej. 1.55 mts')) }}
                                </div>
                                <div class="form-contgrol">
                                    {{ Form::label('weight', 'Peso: ')}}
                                    {{ Form::input('text', 'weight', null, array('class'=>'form-control', 'placeholder'=>'Ej. 65 Kg')) }}
                                </div>
                                <div class="form-contgrol">
                                    {{ Form::label('eye', 'Color de los ojos: ')}}
                                    {{ Form::input('text', 'eye', null, array('class'=>'form-control', 'placeholder'=>'Ej. cafe')) }}
                                </div>
                                <div class="form-contgrol">
                                    {{ Form::label('hair', 'Color del cabello: ')}}
                                    {{ Form::input('text', 'hair', null, array('class'=>'form-control', 'placeholder'=>'Ej. negro')) }}
                                </div>
                                </p>
                                <p class="text-center">
                                    <a href="#photo" data-toggle="tab" class="btn btn-success btn-outline-rounded green"> siguiente <span style="margin-left:10px;"><i class="fa fa-chevron-right"></i></span></a>
                                </p>
                            </div>
                            <div class="tab-pane fade" id="photo">
                                <h3 class="head text-center">Agregue una foto</h3>
                                <p class="narrow text-center">
                                    {{Form::label('image', '¿Tienes alguna fotografia?: ')}}
                                    {{Form::input('file','image','null',array('class'=>'form-control','multiple'))}}
                                    <img class="img-thumbnail" id="preview" />
                                    <img src="" id="preview" alt="">
                                </p>
                                <p class="text-center">
                                    <a href="#details" data-toggle="tab" class="btn btn-success btn-outline-rounded green"> siguiente <span style="margin-left:10px;"><i class="fa fa-chevron-right"></i></span></a>
                                </p>
                            </div>
                            <div class="tab-pane fade" id="details">
                                <h3 class="head text-center">Detalles acerca de la desaparición </h3>
                                <div class="form-group" id="missingsincedate">
                                    {{ Form::label('missingsince', 'Fecha de la Desa    parición:')}}
                                    <div class="input-group date">
                                        {{ Form::input('text', 'missingsince', null, array('class'=>'form-control')) }}<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                                <script>
                                    $('#missingsincedate .input-group.date').datepicker({
                                        language: "es",
                                        autoclose: true,
                                        todayHighlight: true,
                                        toggleActive: true
                                    });
                                </script>
                                <div class="form-group">
                                    {{Form::label('place', 'Ultimo lugar donde se le vio (Tambien lo puede ubicar en el mapa): ')}}
                                    {{Form::textarea('place',null,array('placeholder'=>'Describa la ubicación donde se le vio por utlima ves ','class'=>'form-control')) }}
                                </div>
                                <div class="form-group">
                                    {{Form::label('clothing', 'Vestimienta que llevaba:')}}
                                    {{Form::textarea('clothing',null,array('placeholder'=>'Describa la vestimenta que llevaba','class'=>'form-control')) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('contact_number', 'Numero de Contacto:')}}
                                    {{ Form::input('text', 'contact_number', null, array('class'=>'form-control')) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('description', 'Alguna otra descripción:')}}
                                    {{ Form::textarea('description', null, array('class'=>'form-control', 'placeholder'=>'Describa si llevaba algun objeto(joyas, computadora, pasaporte, etc), tambien puedes indicar la posición favorita de la persona si es que lo tenia. ')) }}
                                </div>



                                <p class="text-center">
                                    <a href="#finished" data-toggle="tab" class="btn btn-success btn-outline-rounded green"> Siguiente <span style="margin-left:10px;" class="fa fa-chevron-right"></span></a>
                                </p>
                            </div>
                            <div class="tab-pane fade" id="maploc">
                                <h3 class="head text-center">Ubica el ultimo lugar donde se vio a la persona: </h3>
                                <p class="narrow text-center">
                                <div id="map" style="width: 100%px; height: 500px"></div>
                                {{ Form::input('hidden','lat','',array('id'=>'lat','class'=>'form-control')) }}
                                {{ Form::input('hidden','lng','',array('id'=>'lng','class'=>'form-control')) }}
                                <script src="{{asset('/js/leaflet.js')}}"></script>
                                <script>
                                    //var coordinates = document.getElementById('coordinates');
                                    var map = L.map('map').setView([-16.503002, -68.129139], 16);
                                    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                                        maxZoom: 18,
                                        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
                                        '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                                        'Imagery © <a href="http://mapbox.com">Mapbox</a>',
                                        id: 'examples.map-i875mjb7'
                                    }).addTo(map);
                                    var marker =L.marker([-16.503002, -68.129139],{draggable: true}).addTo(map)
                                            .bindPopup("<b>Mueveme a la ubicación!</b><br />").openPopup();

                                    var popup = L.popup();

                                    function onMapClick(e) {
                                        popup
                                                .setLatLng(e.latlng)
                                                .setContent("You clicked the map at " + e.latlng.toString())
                                                .openOn(map);
                                        var x=e.latlng;
                                        L.marker([x.lat, x.lng], {draggable:true}).addTo(map);
                                    }
                                    marker.on('dragend', ondragend);
                                    ondragend();
                                    function ondragend() {
                                        var m = marker.getLatLng();
                                        document.getElementById('lat').value=(m.lat);
                                        document.getElementById('lng').value=(m.lng);
                                    }
                                </script>
                                </p>
                                <p class="text-center">
                                    <a href="#finished" data-toggle="tab" class="btn btn-success btn-outline-rounded green"> siguiente <span style="margin-left:10px;" class="fa fa-chevron-right"></span></a>
                                </p>
                            </div>
                            <div class="tab-pane fade" id="finished">
                                <div class="text-center">
                                    <i class="img-intro icon-checkmark-circle"></i>
                                </div>
                                <h3 class="head text-center">Gracias por llenar los datos</h3>
                                <p class="narrow text-center">
                                    {{Form::submit('Guardar Datos', array('class'=>'btn btn-primary')) }}
                                </p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </section>
        @else
            <div class="alert alert-danger" role="alert">
                <strong>No puedes Agregar personas Desaparecidas!</strong> Al parecer no has iniciado sesión, inicia sesión o registrate.
            </div>

            <a href="/login">
                <button type="button" class="btn btn-primary">Iniciar Sesion </button>
            </a> o
            <a href="/register"><button type="button" class="btn btn-danger">Registrarse</button></a>
        @endif
        <script>
            $(function() {
                $('a[title]').tooltip();
            });
            $('#image').on('change', function() {
                var oFile = document.getElementById('image').files[0];
                var img = document.getElementById('preview');
                var reader = new FileReader();
                reader.onload = function(e){
                    img.src = e.target.result;
                };
                reader.readAsDataURL(oFile);
            });
        </script>
@stop