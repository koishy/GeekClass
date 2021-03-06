<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>

    <!-- Styles -->
    <!-- Latest compiled and minified CSS -->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/alchemy-white.css')}}"/>
    <style>
        .alchemy text {
            display: block !important;
        }

        .alchemy g.active {
            opacity: 1;
        }

        g.use > circle {
            opacity: 1 !important;
            stroke: #fcff18 !important;
            stroke-opacity: 0.8;
            fill: green !important;
        }

        g.exists > circle {
            opacity: 0.8;

        }

        .alchemy > svg {
            background: white !important;
        }

        g.exists > text {
            fill: black;
            text-shadow: none;
        }

        g.use > text {
            fill: white !important;
            text-shadow: none;
        }
    </style>

    <link rel="stylesheet" href="{{url('/css/app.css')}}">


</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a href="{{url('/')}}" class="navbar-brand" href="#"><img style="height: 35px;" src="{{url('images/hlogo.png')}}"/></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{(Request::is('insider/courses*') ? 'active' : '') }}">
                <a class="nav-link" href="{{url('/insider/courses')}}">Курсы <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{(Request::is('insider/forum*') ? 'active' : '') }}">
                <a class="nav-link" href="{{url('insider/forum')}}">Ответы</a>
            </li>
            <li class="nav-item {{(Request::is('insider/ideas*') ? 'active' : '') }}">
                <a class="nav-link" href="{{url('insider/ideas')}}">Идеи</a>
            </li>
            <li class="nav-item {{(Request::is('insider/community*') ? 'active' : '') }}">
                <a class="nav-link" href="{{url('insider/community')}}">Сообщество</a>
            </li>
            <li class="nav-item {{(Request::is('insider/projects*') ? 'active' : '') }}">
                <a class="nav-link" href="{{url('insider/projects')}}">Проекты</a>
            </li>
            <li class="nav-item {{(Request::is('insider/events*') ? 'active' : '') }}">
                <a class="nav-link" href="{{url('insider/events')}}">События</a>
            </li>
            <li class="nav-item {{(Request::is('insider/market*') ? 'active' : '') }}">
                <a class="nav-link" href="{{url('insider/market')}}">Магазин</a>
            </li>
        </ul>

        <ul class="navbar-nav" style="width: 260px;">
            <span style="margin-top: 8px; color: white;">
               <img src="https://png.icons8.com/color/50/000000/coins.png"
                    style="height: 23px;">&nbsp;{{Auth::user()->balance()}}&nbsp;&nbsp;

            </span>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}</a>

                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="{{url('insider/profile')}}"><i class="icon ion-person"></i>
                        Профиль</a>
                    <a class="dropdown-item" href="{{url('insider/core/'.\Auth::User()->id)}}"><i
                                class="icon ion-map"></i> Карта</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="icon ion-reply"></i>Выход</a>

                </div>
            </li>
        </ul>
    </div>
</nav>


@if(Session::has('alert-class') and Session::get('alert-destination')=='head')
    <div class="alert {{ Session::get('alert-class') }} alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span>
        </button>
        <strong>{{Session::get('alert-title')}}</strong> {{ Session::get('alert-text') }}
    </div>
@endif
@yield('content')




<!-- Compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script>


<!-- Scripts -->
<!--
    <script src="{{ asset('js/app.js') }}"></script>-->
<form style="display: none;" id="logout-form" method="POST" action="{{ route('logout') }}">{{ csrf_field() }}</form>
<script>
    var url = document.location.toString();

    if (url.match('#')) {
        $('a[href="#' + url.split('#')[1] + '"]').tab('show');
        console.log(url.split('#')[1]);
    }

    // Change hash for page-reload
    $('.nav-tabs a').on('shown.bs.tab', function (e) {
        window.location.hash = e.target.hash;
    })
    $('div').linkify({
        target: "_blank"
    });
</script>

</body>
</html>
