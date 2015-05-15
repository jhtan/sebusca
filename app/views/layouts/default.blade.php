<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('vendor/flat-ui/flat-ui.css')}}">
    <script type="text/javascript" src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/flat-ui/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/isotope/isotope.pkgd.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/styleScripts.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/flat-ui/flat-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.mixitup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
    <link type="text/css" rel="stylesheet" href="{{asset('css/style-new.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/glyphicons.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>

<!-- Begin Header -->
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
                <a class="navbar-brand logo" href="#">Se Busca</a>
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
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">User {{Auth::user()->username}}   Options <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="/logout">Logout</a></li>
                            </ul>
                        <li><a href="#"><span class="visible-sm visible-xs">Settings<span class="fui-gear"></span></span><span class="visible-md visible-lg"><span class="fui-gear"></span></span></a></li>
                    </ul>
                @endif
            </div><!--/.navbar-collapse -->
        </div>
    </nav>
    @yield('content')
</div>
</body>
</html>
