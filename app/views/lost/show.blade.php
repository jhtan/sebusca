@extends('layouts.default')
@section('content')
  <h1>{{$lost->name}} {{$lost->last_name}}</h1>
  <h2>{{$lost->document_number}}</h2>
@stop