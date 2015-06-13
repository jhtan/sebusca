@extends('layouts.default')
@section('content')
    <link rel="stylesheet" href="{{asset('css/leaflet.css')}}">
    <style>
        .mycluster {
            width: 40px;
            height: 40px;
            background-color: greenyellow;
            text-align: center;
            font-size: 24px;
        }
        #map {
            width: 100%;
            height: 600px;
            border: 1px solid #ccc;
        }

        #progress {
            display: none;
            position: absolute;
            z-index: 1000;
            left: 400px;
            top: 300px;
            width: 200px;
            height: 20px;
            margin-top: -20px;
            margin-left: -100px;
            background-color: #fff;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 4px;
            padding: 2px;
        }

        #progress-bar {
            width: 0;
            height: 100%;
            background-color: #76A6FC;
            border-radius: 4px;
        }
        .leaflet-cluster-anim .leaflet-marker-icon, .leaflet-cluster-anim .leaflet-marker-shadow {
            -webkit-transition: -webkit-transform 0.3s ease-out, opacity 0.3s ease-in;
            -moz-transition: -moz-transform 0.3s ease-out, opacity 0.3s ease-in;
            -o-transition: -o-transform 0.3s ease-out, opacity 0.3s ease-in;
            transition: transform 0.3s ease-out, opacity 0.3s ease-in;
        }
        .marker-cluster-small {
            background-color: rgba(181, 226, 140, 0.6);
        }
        .marker-cluster-small div {
            background-color: rgba(110, 204, 57, 0.6);
        }

        .marker-cluster-medium {
            background-color: rgba(241, 211, 87, 0.6);
        }
        .marker-cluster-medium div {
            background-color: rgba(240, 194, 12, 0.6);
        }

        .marker-cluster-large {
            background-color: rgba(253, 156, 115, 0.6);
        }
        .marker-cluster-large div {
            background-color: rgba(241, 128, 23, 0.6);
        }

        /* IE 6-8 fallback colors */
        .leaflet-oldie .marker-cluster-small {
            background-color: rgb(181, 226, 140);
        }
        .leaflet-oldie .marker-cluster-small div {
            background-color: rgb(110, 204, 57);
        }

        .leaflet-oldie .marker-cluster-medium {
            background-color: rgb(241, 211, 87);
        }
        .leaflet-oldie .marker-cluster-medium div {
            background-color: rgb(240, 194, 12);
        }

        .leaflet-oldie .marker-cluster-large {
            background-color: rgb(253, 156, 115);
        }
        .leaflet-oldie .marker-cluster-large div {
            background-color: rgb(241, 128, 23);
        }

        .marker-cluster {
            background-clip: padding-box;
            border-radius: 20px;
        }
        .marker-cluster div {
            width: 30px;
            height: 30px;
            margin-left: 5px;
            margin-top: 5px;

            text-align: center;
            border-radius: 15px;
            font: 12px "Helvetica Neue", Arial, Helvetica, sans-serif;
        }
        .marker-cluster span {
            line-height: 30px;
        }


    </style>

    <div class="container">
        <div class="page-header">
            <h2>Mapa de Desaparecidos</h2>
        </div>
        <!-- Timeline -->

            <script src="{{asset('/js/leaflet.js')}}"></script>
            <script src="{{asset('/js/leaflet.markercluster-src.js')}}"></script>
            <div id="map" ></div>
            <script>
                var addressPoints = [
                        @foreach($seenPeople as $r)
                        [{{$r->latitude}},{{$r->longitude}},"{{$r->description}}"],
                        @endforeach
                    ];
                </script>
            </sript>
            <script>
                MB_ATTR = '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors';
                MB_URL = 'http://{s}.tile.osm.org/{z}/{x}/{y}.png';
                OSM_URL = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
                OSM_ATTRIB = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors';
                var mapbox = new L.TileLayer(MB_URL, {maxZoom: 18, attribution: MB_ATTR, id: 'examples.map-i875mjb7'}),
                        latlng = new L.LatLng(-16.502879030111227, -68.1305980682373);

                var map = new L.Map('map', {center: latlng, zoom: 13, layers: [mapbox]});

                map.attributionControl.addAttribution("Points &copy 2012 LINZ");

                var markers = new L.MarkerClusterGroup();

                for (var i = 0; i < addressPoints.length; i++) {
                    var a = addressPoints[i];
                    var title = a[2];
                    var marker = new L.Marker(new L.LatLng(a[0], a[1]), { title: title });
                    marker.bindPopup(title);
                    markers.addLayer(marker);
                }

            map.addLayer(markers);

            </script>

        </div>
        <!-- /Timeline -->
    </div>
@stop