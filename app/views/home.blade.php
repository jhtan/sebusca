@extends('layouts.default')
@section('content')
    <div class="row">
                <a href="/lost/create" class="btn btn-primary btn-lg homeButton">Reportar Desaparecido</a>
                <a href="javascript:void(0)" class="btn btn-primary btn-lg homeButton">Reportar Persona Vista</a>
                <a href="javascript:void(0)" class="btn btn-primary btn-lg homeButton">Mapa de Desaparecidos</a>
        </div>
    </div><!--end container-->
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


    <main class="cd-main-content container">
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
                    <li class="filter"><a href="#0" data-sort-value="date">Fecha</a></li>
                </ul>
                <!-- cd-filters -->
            </div>
            <!-- cd-tab-filter -->
        </div>
        <!-- cd-tab-filter-wrapper -->

        <section class="cd-gallery gallery">
            @if($lost->count())
                @foreach($lost as $lost_people)
                    <!--<li class="missingPeopleItem mix color-1 check1 radio2 option3" data-name="{{$lost_people->name}}" data-lastName="{{$lost_people->last_name}}" data-date="{{$lost_people->created_at}}">
                  <img src="{{asset('images/walt_missing_poster.jpg')}}" alt="Image 1">
              </li>-->
                    <!--
                  <a href="/lost/{{$lost_people->id}}">
                      <div class="missingPeopleItem" data-name="{{$lost_people->name}}" data-lastName="{{$lost_people->last_name}}" data-date="{{$lost_people->created_at}}">
                          <img src="{{asset('images/walt_missing_poster.jpg')}}">
                      </div>
                  </a>-->



                    <div class="col-sm-6 col-md-4 people"  data-category="">
                        <div class="thumbnail">
                            <img src="{{asset('images/walt_missing_poster.jpg')}}" role="button" data-toggle="modal" data-target="#{{$lost_people->id}} " width="100%" alt="">
                            <div class="caption">
                                <h2 class="name">{{$lost_people->name}}</h2>
                                <h5 class="last_name">{{$lost_people->last_name}} </h5>
                                <h3 class="date">{{$lost_people->created_at}}</h3>
                                <p>
                                    <a role="button" class="btn btn-primary" href="#">Reportar vista</a>
                                </p>
                            </div>
                            <!-- <div class="line r"></div> -->
                        </div>
                        <div id="{{$lost_people->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <span role="button" data-dismiss="modal" aria-label="labelClose" class="glyphicon glyphicon-remove close" style="color:#ff0000;"></span>
                                        <h4 class="modal-title" id="myModalLabel">{{$lost_people->last_name}}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Artists: </h4>
                                        <!--init popover-->
                                        <h4>Popover in a modal</h4>
                                        <p>This <a href="#" role="button" class="btn btn-default popover-test" title="A Title" data-content="And here's some amazing content. It's very engaging. right?">button</a> should trigger a popover on click.</p>
                                        <!--end popover-->
                                        <h4>Cover:</h4>
                                        <p>
                                            <img src="{{asset('images/walt_missing_poster.jpg')}}" alt=" ">
                                        </p>
                                        <hr>
                                        <h4>Genres: </h4>
                                        <h4>Label: </h4>

                                    </div>
                                    <div class="modal-footer">
                                        <a href="#" role="button" class="btn btn-primary">More Details</a>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                    </div>
                <!--
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail peopleitem" data-name="{{$lost_people->name}}" data-lastName="{{$lost_people->last_name}}" data-date="{{$lost_people->created_at}}">
                            <a href="/lost/{{$lost_people->id}}">
                                <img src="{{asset('images/walt_missing_poster.jpg')}}"  alt=" />
                          <div class="caption"></a>
                            <h5>{{$lost_people->name}} {{$lost_people->last_name}} </h5>
                            <p>{{$lost_people->name}} {{$lost_people->last_name}}
                                {{$lost_people->document_number}}
                                {{$lost_people->date_of_birth}}
                                {{$lost_people->clothing}}
                                {{$lost_people->nationality}}
                                {{$lost_people->description}}
                            </p>
                            <p>
                                <a role="button" class="btn btn-primary" href="#">Reportar vista</a>
                            </p>
                        </div>

                    </div>
                        -->
                @endforeach
            @else
                <p>NOOOOOOsoodosods</p>
            @endif
            <div class="cd-fail-message">No results found</div>
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
        <a href="#0" class="cd-filter-trigger">Filters
            </a>
    </main> <!-- cd-main-content -->
@stop