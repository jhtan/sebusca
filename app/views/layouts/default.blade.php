<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('css/reset.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('vendor/flat-ui/flat-ui.css')}}">
    <!--<script type="text/javascript" src="{{asset('vendor/jquery-2.1.1.min.js')}}"></script>-->
    <script type="text/javascript" src="{{asset('vendor/flat-ui/jquery.min.js')}}"></script>
    <!--<script type="text/javascript" src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>-->
    <script type="text/javascript" src="{{asset('vendor/isotope/isotope.pkgd.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/styleScripts.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/flat-ui/flat-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/application.js')}}"></script>
    <link type="text/css" rel="stylesheet" href="{{asset('css/style-new.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/glyphicons.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/linkstyles.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/styleThum.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('vendor/font-awesome-4.3.0/css/font-awesome.min.css')}}">
    <style>
        .navbar-form input,
        .form-inline input {
            width: auto;
        }

        header {
            height: 280px;
            background-color: #eee;
        }

        #nav.affix {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 10;
        }
    </style>
</head>
<body>

<!-- Begin Header -->
<header class="masthead">
    <div class="container">
        <nav class="navbar navbar-inverse navbar-lg navbar-embossed" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-9">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class=" navbar-brand grid___item color-4">
                    <a class="link link--kumya" href="/" title="Inicio"><span data-letters="Se Busca">Se Busca</span>
                    </a>
                </div>
            </div>
            <div class="navbar-collapse collapse" id="navbar-collapse-9">
                @if(!Auth::check())
                    {{ Form::open(['route' => 'sessions.store', 'class'=>'navbar-form navbar-right'])}}
                    <div class="form-group">
                        {{Form::input('email','email',null,array('class'=>'form-control','placeholder'=>'Email'))}}
                    </div>
                    <div class="form-group">
                        {{ Form::password('password',array('placeholder'=>'Password','class'=>'form-control')) }}
                    </div>
                    {{ Form::submit('Sign in',array('class'=>'btn')) }}
                    <a href="/login">
                        <button type="button" class="btn btn-primary">Login</button>
                    </a>
                    <a href="/register"><button type="button" class="btn btn-danger">Register</button></a>
                    {{Form::close() }}

                @else
                    <!--
                    <ul class="nav navbar-nav">
                        <li><a href="#">Messages<span class="navbar-unread">1</span></a></li>
                        <li ><a href="#">About Us</a></li>
                        <li><a href="#">Clients</a></li>
                    </ul>
                    <form class="navbar-form navbar-left" action="#" role="search" id="601311408">
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" id="navbarInput-01" type="search" placeholder="Search">
                <span class="input-group-btn">
                  <button type="submit" class="btn"><span class="fui-search"></span></button>
                </span>
                            </div>
                        </div>
                    </form>-->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Opciones para el usuario {{Auth::user()->username}} <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Editar Datos</a></li>
                                <li class="divider"></li>
                                <li><a href="/logout">Salir</a></li>
                            </ul>
                        <!--<li><a href="#"><span class="visible-sm visible-xs">Settings<span class="fui-gear"></span></span><span class="visible-md visible-lg"><span class="fui-gear"></span></span></a></li>-->
                    </ul>
                @endif
            </div><!--/.navbar-collapse -->
        </div>
    </nav>
    @yield('content')
</body>
</html>
