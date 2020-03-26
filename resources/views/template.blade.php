<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/template.css">
  @yield('css')
  <title>
    @yield('titulo')
  </title>
</head>
<body>
   <div class="container">

     {{-- NAV --}}
     <nav class="site-header sticky-top py-1">
       <div class="container2 d-flex flex-column flex-md-row justify-content-between">
         <a class="py-2" href="http://localhost:8000/" aria-label="movie">
           <i class="fas fa-film"></i>
         </a>
         <button class="navbar-toggler justify-content-center" type="button" data-toggle="collapse" data-target="#buno">
           <i class="fa fa-bars tros" aria-hidden="false"></i>
         </button>
         <div class="collapse navbar-collapse" id="buno">
           <ul class="navbar-nav">
             <li class="nav-item"><a class="py-2 d-none d-md-inline-block" href="#">Titulos</a></li>
             <li class="nav-item"><a class="py-2 d-none d-md-inline-block" href="#">Agregar</a></li>
           </ul>
         </div>
         <div class="collapse navbar-collapse justify-content-end" id="buno">
           <ul class="navbar-nav">
             @guest


               <li class="nav-item"><a href="http://localhost:8000/login" class="nav-link">Login</a></li>
               <li class="nav-item"><a href="http://localhost:8000/register" class="nav-link">Registro</a></li>


             @else

               <li class="nav-item"><a href="http://localhost:8000/Perfil" class="nav-link">Usuario</a></li>
               <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link"  onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">Log out</a></li>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                   @csrf
                 </form>

               @endguest
             </ul>


       </div>
      </nav>

     {{-- END NAV --}}

     @yield('principal')

     {{-- FOOTER --}}

     <div class="cont-imagen">
       <div id="imagen">
         <a href="#"><i class="far fa-arrow-alt-circle-up"></i></a>
       </div>
     </div>

     <footer class="footer">
       <div class="social">
         <a href="https://es-la.facebook.com" target="_blank"><img src="/storage/icono1.png" alt"Facebook"></a>
         <a href="https://twitter.com" target="_blank"><img src="/storage/icono2.png" alt"Twitter"></a>
         <a href="https://www.youtube.com" target="_blank"><img src="/storage/icono3.png" alt"Youtube"></a>
       </div>
     </footer>

     {{-- END FOOTER --}}

   </div>

   {{-- <script src="https://kit.fontawesome.com/60afb82e62.js" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> --}}

</body>
</html>
