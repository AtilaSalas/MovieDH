<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/template.css">
</head>
<body class="body-login-r">
    <div id="app" class="d-flex flex-column h-100">
        <nav class="site-header navbar-expand-md sticky-top py-1">
            <div class="container2 d-flex flex-column flex-md-row mx-auto">
                <a class="mx-auto mx-md-4 my-md-1 pt-1 d-block " href="http://localhost:8000/" aria-label="movie">
                  <i class="fas fa-film"></i>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <i class="fa fa-bars tros" aria-hidden="false"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item"><a class="nav-link py-2" href="http://localhost:8000/">Inicio</a></li>
                      <li class="nav-item"><a class="nav-link py-2" href="http://localhost:8000/titulos">Titulos</a></li>
                      <li class="nav-item"><a class="nav-link py-2" href="http://localhost:8000/pelicula/1">Detalle</a></li>
                    </ul>
                    <div class="dropdown-divider"></div>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresá') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registráte') }}</a>
                                </li>
                            @endif
                        @else

                            @if (Auth::user()->rol_id == 2)
                                <li class="nav-item"><a class="nav-link py-2" href="http://localhost:8000/agregar">Agregar</a></li
                                  <li class="nav-item"><a class="nav-link py-2" href="http://localhost:8000/editar/1">Editar</a></li>>
                            @endif

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="pb-5 py-md-5 my-auto">
            @yield('content')
        </main>

        <div class="cont-imagen">
          <div id="imagen">
            <a href="#"><i class="far fa-arrow-alt-circle-up"></i></a>
          </div>
        </div>




    <footer class="footer mt-auto">
      <div class="social">
        <a href="https://es-la.facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
        <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="https://www.youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
      </div>
      <p> <a href="http://localhost:8000/api/titulos">API de titlos | </a>All-rights reserved  | 2020</p>
    </footer>
  </div>
    <script src="https://kit.fontawesome.com/60afb82e62.js" crossorigin="anonymous"></script>
</body>
</html>
