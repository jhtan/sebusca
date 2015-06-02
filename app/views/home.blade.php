@extends('layouts.default')
@section('content')
    <div class="row">
                <a href="/lost/create" class="btn btn-primary btn-lg homeButton">Reportar Desaparecido</a>
                <a href="javascript:void(0)" class="btn btn-primary btn-lg homeButton">Reportar Persona Vista</a>
                <a href="javascript:void(0)" class="btn btn-primary btn-lg homeButton">Mapa de Desaparecidos</a>
        </div>
    </div>
    </header>
            <!--
      <div id="missingPeopleOderButtons1" class="col-md-6">
        <h3>Ordenar por:</h3>
        <button href="javascript:void(0)" class="btn btn-info orderButtons" data-sort-by="date">Fecha</button>
        <button href="javascript:void(0)" class="btn btn-info orderButtons" data-sort-by="name">Nombre</button>
        <button href="javascript:void(0)" class="btn btn-info orderButtons" data-sort-by="lastName">Apellido</button>
      </div>
      <div id="missingPeopleOderButtons1" class="col-md-6">
        <h3>Filtrar por:</h3>
        <a href="javascript:void(0)" class="btn btn-warning orderButtons">Fecha</a>
        <a href="javascript:void(0)" class="btn btn-warning orderButtons">Nombre</a>
        <a href="javascript:void(0)" class="btn btn-warning orderButtons">Apellido</a>
      </div>
      <div id="missingPeopleContainer1">
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
                    </div>-->
    <main class="cd-main-content">
        <div class="cd-tab-filter-wrapper">
            <div class="cd-tab-filter" id="sorts">
                <ul class="cd-filters">
                    <li class="placeholder">
                        <a data-type="all" href="#0">All</a>
                        <!-- selected option on mobile -->
                    </li>
                    <li class="filter"><a class="selected" href="#0" data-sort-value="original-order">original order</a></li>
                    <li class="filter"><a href="#0" data-sort-value="name">Nombre</a></li>
                    <li class="filter"><a href="#0" data-sort-value="last_name">Apellido</a></li>
                    <li class="filter"><a href="#0" data-sort-value="height">Height</a></li>
                    <li class="filter"><a href="#0" data-sort-value="weight">Weight</a></li>
                    <li class="filter"><a href="#0" data-sort-value="date">Fecha</a></li>
                </ul>
                <!-- cd-filters -->
            </div>
            <!-- cd-tab-filter -->
        </div>
        <!-- cd-tab-filter-wrapper -->
        <div class="container">
            <div class="row">
                <section class="grid_Thum">
                    @if($lost->count())
                        @foreach($lost as $lost_people)
                            <a href="/lost/{{$lost_people->id}}" class="grid__item">
                                <h2 class="title_Thum title--preview name">{{$lost_people->name}}&nbsp;<span class="last_name">{{$lost_people->last_name}}</span></h2>
                                <div class="loader"></div>
                                <div class="category">State <i class="fa fa-check"></i></div>
                                <div class="meta meta--preview">
                                    <img class="meta__avatar" src="{{asset('images/walt_missing_poster.jpg')}}" alt="{{$lost_people->id}}" />
                                    <span class="meta__date"><i class="fa fa-calendar-o"></i> {{$lost_people->missing_since}}</span>
                                    <span class="meta__reading-time"><i class="fa fa-clock-o"></i> 33  min lost</span>
                                    <br>
                                    <span class="meta__date"><i class="fa fa-arrows-v"></i> <span class="height">{{$lost_people->height}}</span></span>
                                    <span class="meta__reading-time weight"><i class="fa fa-anchor"></i> {{$lost_people->weight}}</span>
                                    <br>
                                    <span class="meta__date"><i class="fa fa-eye"></i> {{$lost_people->eyes}}</span>
                                    <span class="meta__reading-time"><i class="fa fa-phone"></i> {{$lost_people->contact_number}}</span>
                                    <br>

                                    <span class="meta__date"><i class="fa fa-building-o"></i> {{$lost_people->city_id}}</span>
                                    <span class="meta__reading-time"><i class="fa fa-flag"></i> {{$lost_people->country_id}}</span>
                                    <br>
                                    @if($lost_people->sex=='femenino')
                                        <span class="meta__date"><i class="fa fa-venus"></i> </span>
                                    @else
                                        <span class="meta__date"><i class="fa fa-mars"></i> </span>
                                    @endif

                                    <span class="meta__date"><i class="fa fa-mars"></i> </span>
                                    <span class="meta__date"><i class="fa fa-mars"></i> </span>
                                    <span class="meta__date"><i class="fa fa-mars"></i> </span>
                                    <span class="meta__date"><i class="fa fa-mars"></i> </span>

                                </div>
                            </a>
                                <!--<div class="thumbnail peopleitem" data-name="{{$lost_people->name}}" data-lastName="{{$lost_people->last_name}}" data-date="{{$lost_people->created_at}}"><a href="/lost/{{$lost_people->id}}"></div>-->
                         @endforeach

                    @else
                        <div class="cd-fail-message" style="display:block;">No se encontraron Datos</div>
                    @endif
                </section>
            </div>
        </div>

        </section> <!-- cd-gallery -->

        <div class="cd-filter">
            <form>
                <div class="cd-filter-block">
                    <h4>Search</h4>
                    <div class="cd-filter-content">
                        <input type="text" id="quicksearch" placeholder="Search... ">
                    </div>
                    <!-- cd-filter-content -->
                </div>
                <!-- cd-filter-block -->
                <div class="cd-filter-block">
                    <h4>Check boxes</h4>
                    <ul class="cd-filter-content cd-filters list">
                        <li>
                            <input class="filter" data-filter=".check1" type="checkbox" id="checkbox1">
                            <label class="checkbox-label" for="checkbox1">Option 1</label>
                        </li>
                        <li>
                            <input class="filter" data-filter=".check2" type="checkbox" id="checkbox2">
                            <label class="checkbox-label" for="checkbox2">Option 2</label>
                        </li>
                        <li>
                            <input class="filter" data-filter=".check3" type="checkbox" id="checkbox3">
                            <label class="checkbox-label" for="checkbox3">Option 3</label>
                        </li>
                    </ul>
                    <!-- cd-filter-content -->
                </div>
                <!-- cd-filter-block -->
                <div class="cd-filter-block">
                    <h4>Select</h4>
                    <div class="cd-filter-content">
                        <div class="cd-select cd-filters">
                            <select class="filter" name="selectThis" id="filters-select">
                                <option value="">Choose an option</option>
                                <option value="*">show all</option>
                                <option value=".metal">metal</option>
                                <option value=".transition">transition</option>
                                <option value=".alkali, .alkaline-earth">alkali and alkaline-earth</option>
                                <option value=":not(.transition)">not transition</option>
                                <option value=".metal:not(.transition)">metal but not transition</option>
                                <option value="numberGreaterThan50">number &gt; 50</option>
                                <option value="ium">name ends with –ium</option>
                            </select>
                        </div>
                        <!-- cd-select -->
                    </div>
                    <!-- cd-filter-content -->
                </div>
                <!-- cd-filter-block -->
                <div class="cd-filter-block" id="filters-radio">
                    <h4>Radio buttons Optionss</h4>
                    <ul class="cd-filter-content cd-filters list">
                        <li>
                            <input type="radio" id="all" name="filter" value="*" checked="checked">
                            <label class="radio-label" for="all">All</label>
                        </li>
                        <li>
                            <input type="radio" id="trance" name="filter" value=".trance">
                            <label class="radio-label" for="trance">Trance</label>
                        </li>
                        <li>
                            <input type="radio" name="filter" id="progressive-house" value=".progressive-house">
                            <label class="radio-label" for="progressive-house">Progressive House</label>
                        </li>
                        <li>
                            <input type="radio" name="filter" id="electro-house" value=".electro-house">
                            <label class="radio-label" for="electro-house">Electro House</label>
                        </li><li>
                            <input type="radio" name="filter" id="hip-hop" value=".hip-hop">
                            <label class="radio-label" for="hip-hop">Hip Hop</label>
                        </li>
                        <li>
                            <input type="radio" name="filter" id="nottrane" value=":not(.trance)">
                            <label class="radio-label" for="nottrane">not Trance</label>
                        </li>
                        <li>
                            <input type="radio" name="filter" id="bpm128" value="bpm128">
                            <label class="radio-label" for="bpm128">bpm &gt; 128</label>
                        </li>
                        <li>
                            <input type="radio" name="filter" id="nameend" value="ium">
                            <label class="radio-label" for="nameend">name ends with –ium</label>
                        </li>
                    </ul>
                    <!-- cd-filter-content -->
                </div>
                <!-- cd-filter-block -->
            </form>
            <a href="#0" class="cd-close">Close</a>
        </div>
        <!-- cd-filter -->
        <a href="#0" class="cd-filter-trigger">Filters</a>
    </main> <!-- cd-main-content -->
@stop