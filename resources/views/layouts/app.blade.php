<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FUDEBIOL DIGITAL') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/common-script.js') }}"></script>
    <script src="{{ asset('js/main-script.js') }}"></script>
    <script src="{{ asset('js/galeria.js') }}"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet"  type="text/css" >
    <link href="{{ asset('css/register.css') }}" rel="stylesheet"  type="text/css" >
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet"  type="text/css" >
     <link href="{{ asset('css/mantenimientoUsuarios.css') }}" rel="stylesheet"  type="text/css" >
     <link href="{{ asset('css/galeria.css') }}" rel="stylesheet"  type="text/css" >
    <link href="{{ asset('css/main-style.css') }}" rel="stylesheet"  type="text/css"> 
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Heebo&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">

</head>
<header>
    @guest
        @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif
        
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
            </li>
        @endif
    @else
            <div id="cabeza">
                <div class="sitename">
                    <img class="logo" src="img/vector.png">
                    <div class="text">FUDEBIOL</div>
                </div>
                <nav class="menu">
                    <a href="http://localhost:8000/home">
                        <img class="icon" src="img/home.png"></img>
                        <div class="text">Inicio</div>
                    </a>
                    <a href="http://localhost:8000/galeria">
                        <img class="icon" src="img/gallery.png"></img>
                        <div class="text">Galería</div>
                    </a>
                    <a href="http://localhost:8000/registrarArbol">
                        <img class="icon" src="img/tree.png"></img>
                        <div class="text">Mi árbol para la vida</div>
                    </a>
                    <a href="">
                        <img class="icon" src="img/investigation.png"></img>
                        <div class="text">Investigaciones</div>
                    </a>
                    <a href="">
                        <img class="icon" src="img/Information.png"></img>
                        <div class="text">Información</div>
                    </a>
                  
                 <a id="navbarDropdown" class="nav-link dropdown-toggle" href="http://localhost:8000/usuarios" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                 <img class="icon" src="img/user.png"></img>
                <div class="textUser">  {{ Auth::user()->name }}  </div>
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">

                    <img class="icon" src="img/cs.png"></img>
                    <div class="text">  {{ __('Cerrar sesión') }}  </div>
                </a>
                </nav>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
       
    @endguest
</header>

<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
