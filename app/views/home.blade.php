@extends('layouts.default')
@section('content')
  <div class="row">
    <div class="col-md-12">
      <div id="homeActionButtons">
        <a href="/lost/create" class="btn btn-primary btn-lg homeButton">Reportar Desaparecido</a>
        <a href="javascript:void(0)" class="btn btn-primary btn-lg homeButton">Reportar Persona Vista</a>
        <a href="javascript:void(0)" class="btn btn-primary btn-lg homeButton">Mapa de Desaparecidos</a>
      </div>
      <div id="missingPeopleOderButtons" class="col-md-6">
        <h3>Ordenar por:</h3>
        <button href="javascript:void(0)" class="btn btn-info orderButtons" data-sort-by="date">Fecha</button>
        <button href="javascript:void(0)" class="btn btn-info orderButtons" data-sort-by="name">Nombre</button>
        <button href="javascript:void(0)" class="btn btn-info orderButtons" data-sort-by="lastName">Apellido</button>
      </div>
      <div id="missingPeopleOderButtons" class="col-md-6">
        <h3>Filtrar por:</h3>
        <a href="javascript:void(0)" class="btn btn-warning orderButtons">Fecha</a>
        <a href="javascript:void(0)" class="btn btn-warning orderButtons">Nombre</a>
        <a href="javascript:void(0)" class="btn btn-warning orderButtons">Apellido</a>
      </div>
      <div id="missingPeopleContainer">
        @if ($lost->count())
          @foreach ($lost as $lost_people)
            <a href="/lost/{{$lost_people->id}}">
              <div class="missingPeopleItem" data-name="{{$lost_people->name}}" data-lastName="{{$lost_people->last_name}}" data-date="{{$lost_people->created_at}}">
                <img src="{{asset('images/walt_missing_poster.jpg')}}">
              </div>
            </a>
          @endforeach
        @else
          <p>Unfoutunately, there are no users.</p>
        @endif
      </div>
    </div>
  </div>
@stop