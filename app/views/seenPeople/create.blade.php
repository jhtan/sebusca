@extends('layouts.default')
@section('content')
    <script src="{{asset('/js/dropzone.js')}}"></script>

    <link rel="stylesheet" href="{{asset('/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('/css/leaflet.css')}}">
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
    {{ Form::open( ['route' => 'seenPeople.store',  'files' => true, 'class'=>'dropzone'] ) }}
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

        <div class="form-group">
            {{Form::label('image', '¿Tienes alguna fotografia?: (Maximo X MB)')}}
            <!--{{Form::input('file','image','null',array('class'=>'form-control','multiple'))}}-->
            <div id="filedrag">Arrastra y suelta tus <i class="fa fa-picture-o"></i> aqui!
            </div>

        </div>
    </div>
    <div class="col-md-8 well">
        <h4>Localizalo en el Mapa</h4>
        <div id="map" style="width: 600px; height: 400px"></div>
        {{ Form::input('hidden','lat','',array('id'=>'lat','class'=>'form-control')) }}
        {{ Form::input('hidden','lng','',array('id'=>'lng','class'=>'form-control')) }}
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
    <script src="{{asset('/js/leaflet.js')}}"></script>
    <script>
        //var coordinates = document.getElementById('coordinates');
        var map = L.map('map').setView([-16.503002, -68.129139], 16);
        L.tileLayer('https://{s}.tiles.mapbox.com/v3/{id}/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
            '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="http://mapbox.com">Mapbox</a>',
            id: 'examples.map-i875mjb7'
        }).addTo(map);

        var marker =L.marker([-16.503002, -68.129139],{draggable: true}).addTo(map)
                .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();

        L.circle([-16.503002, -68.129139], 50, {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5
        }).addTo(map).bindPopup("I am a circle.");

        L.polygon([
            [51.509, -0.08],
            [51.503, -0.06],
            [51.51, -0.047]
        ]).addTo(map).bindPopup("I am a polygon.");


        var popup = L.popup();

        function onMapClick(e) {
            popup
                    .setLatLng(e.latlng)
                    .setContent("You clicked the map at " + e.latlng.toString())
                    .openOn(map);
            console.log(e.latlng.toString());
            var x=e.latlng;
            L.marker([x.lat, x.lng], {draggable:true}).addTo(map);
        }

        //map.on('click', onMapClick);
        marker.on('dragend', ondragend);
        // Set the initial marker coordinate on load.
        ondragend();
        function ondragend() {
            var m = marker.getLatLng();
            //coordinates.innerHTML = 'Latitude: ' + m.lat + '<br />Longitude: ' + m.lng;
            document.getElementById('lat').value=(m.lat);
            document.getElementById('lng').value=(m.lng);
        }
    </script>
    <script>

        $('#file').on('change',function(){
            alert("hola");
        });
        $(document).ready(function() {
            $('select[name="type"]').select2({dropdownCssClass: 'select-inverse-dropdown'});
        });
    </script>
@stop

