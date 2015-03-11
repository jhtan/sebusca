<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <link type="text/css" rel="stylesheet" href="{{asset('vendor/bootswatch/bootstrap.min.css')}}">
  <link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}">
  <script type="text/javascript" src="{{asset('vendor/jquery-2.1.1.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('vendor/isotope/isotope.pkgd.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/styleScripts.js')}}"></script>
</head>
<body>

<!-- Begin Header -->
<div class="navbar navbar-default">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="/">Se Busca</a>
  </div>
  <div class="navbar-collapse collapse navbar-responsive-collapse">
    <form class="navbar-form navbar-left">
      <input type="text" class="form-control col-lg-8" placeholder="Search">
    </form>
    <ul class="nav navbar-nav navbar-right">
      @if(!Auth::check())
      <li><h5><a href="/login" title="">Login</a></h5></li>
      <li><h5><a href="/register" title="">Registrarse</a></h5></li>
      @else
      <li><h5>Hola! {{Auth::user()->username}}</h5></li>
      <li><h5><a href="/logout">Salir</a></h5></li>
      @endif
    </ul>
  </div>
</div>
<!-- End Header -->

@yield('content')
</body>
</html