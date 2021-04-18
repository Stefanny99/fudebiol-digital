<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('', 'FUDEBIOL DIGITAL') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/alertify.min.js') }}"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/galeria.js') }}"></script>
    <script src="{{ asset('js/mantenimiento-usuarios.js') }}"></script>
    <script src="{{ asset('js/mantenimiento-lotes.js') }}"></script>
    <script src="{{ asset('js/publicaciones.js') }}"></script>
    <script src="{{ asset('js/mantenimiento-arboles.js') }}"></script>
    <script src="{{ asset('js/adopciones.js') }}"></script>
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/notificaciones.js') }}"></script>
    <script src="{{ asset('js/mantenimiento-arboles-lote.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Lobster&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="css/hover.css" rel="stylesheet" media="all">
    <link href="{{ asset('css/alertify.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/themes/default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/MiArbolParaLaVida.css') }}" rel="stylesheet">
    <link href="{{ asset('css/registroPadrinos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/registroLotes.css') }}" rel="stylesheet">
    <link href="{{ asset('css/reportes.css') }}" rel="stylesheet">
    <link href="{{ asset('css/publicaciones.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aboutUs.css') }}" rel="stylesheet">
    <link href="{{ asset('css/arbolPorLote.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mensajes.css') }}" rel="stylesheet">
    <link href="{{ asset('css/informacion.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet"  type="text/css" >
    <link href="{{ asset('css/register.css') }}" rel="stylesheet"  type="text/css" >
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet"  type="text/css" >
    <link href="{{ asset('css/mantenimientoUsuarios.css') }}" rel="stylesheet"  type="text/css" >
    <link href="{{ asset('css/registroArboles.css') }}" rel="stylesheet"  type="text/css" >
    <link href="{{ asset('css/galeria.css') }}" rel="stylesheet"  type="text/css" >
    <link href="{{ asset('css/main-style.css') }}" rel="stylesheet"  type="text/css"> 
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Heebo&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
</head>
<header>
    @if ( Route::current()->getName() != 'login' )

            <div id="cabeza">
                @guest
                @else
                <div class="usuario"> 
                     <a href="{{ route( 'usuarios' ) }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <div class="textUser"> 
                        <i class="fas fa-user"></i>&nbsp
                     {{ Auth::user()->name }} </div>
                    </a>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        <div class="text">  <i class="fas fa-sign-out-alt"></i> </div>
                    </a>
                  
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                @endguest
               
                <nav class="menu">
                <div class="sitename">
                    <img class="logo img-responsive" src="{{ asset('img/logob.png')}}">
                </div>
                <div class="hiperlinks">
                    <a href="{{ route( 'home' ) }}">
                       
                        <div class="text">Inicio</div>
                    </a>


                    <a href="{{ route( 'galeria' ) }}">
                       
                        <div class="text">Galería</div>
                    </a>
                    <a href="{{ route( 'introduccion' ) }}">
                       
                        <div class="text">Mi árbol para la vida</div>
                    </a>
                    
                    <a href="{{ route('atracciones')}}" >
                     
                        <div class="text">Actividades</div>
                    </a>
                    <a href="{{ route( 'sobreNosotros' ) }}">
                     
                        <div class="text">Información</div>
                    </a>
                    <a href="{{ route( 'publicaciones', 1 ) }}">
                       
                       <div class="text">Publicaciones</div>
                   </a>
                    @guest
                    <!-- Solo visitantes -->
                    @else
                    <!-- Solo usuarios -->
                    @if ( Auth::user()->role == 'A' )
                    <a href="{{ route( 'registrarArbol', 1 ) }}">
                        <div class="text">Reg.Especies</div>
                    </a>
                    <a href="{{ route( 'lotes', 1 ) }}">
                        <div class="text">Reg.Lotes</div>
                    </a>
                    <a href="{{ route( 'verPadrino', 1 ) }}">
                        <div class="text">Reg.Padrinos</div>
                    </a>
                    <a href="{{ route( 'registroArbol', 1 ) }}">
                        <div class="text">Reg.Árboles</div>
                    </a>
                    <a href="{{ route( 'mensajes', 1 ) }}">
                        <div class="text">Mensajes</div>
                    </a>
                    <a href="{{ route( 'notificaciones' ) }}">
                        <div class="text">Notificaciones</div>
                    </a>
                    @elseif ( Auth::user()->role == 'S' )
                    <a href="{{ route( 'editorGaleria', 1 ) }}">
                        <div class="text">Edit.Galería</div>
                    </a>
                    @endif
                    
                    @endguest
                  
                </div>
          </nav>
       </div>
    @endif
</header>

<body>
    @if ( Session::has( "errores" ) )
    @foreach ( Session::get( "errores" ) as $error )
    <script>alertify.notify( "{{ $error }}", "error" )</script>
    @endforeach
    @endif
    @if ( Session::has( "mensajes" ) )
    @foreach ( Session::get( "mensajes" ) as $mensaje )
    <script>alertify.notify( "{{ $mensaje }}", "success" )</script>
    @endforeach
    @endif
    <div id="app">
        <main>
            @yield('content')
        </main>
        
    </div>
    
</body>

</html>
