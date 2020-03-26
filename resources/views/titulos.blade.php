@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Todas las Peliculas</div>

                <div class="card-body p-1 pl-md-2 pb-md-2">
                  <form class="form-inline my-2 my-lg-0" method="POST" action="{{URL::to('/titulos')}}">
                    @csrf
                    <input class="form-control mr-sm-2 ml-md-auto" type="text" placeholder="Search" aria-label="Search" name="nombre">
                    <button class="btn btn-outline my-2 my-sm-0" type="submit">Search</button>
                  </form>

                  @forelse ($peliculas as $pelicula)
                    <ul class="pl-1 pl-md-4">
                    <li class="titulosli"><a href="http://localhost:8000/pelicula/{{$pelicula->id}}">{{$pelicula->title}}</a></li>
                    @if ($pelicula->genre)
                      Genero: {{$pelicula->genre->name}}
                      @else
                        <li style="opacity: 0"></li>
                    @endif
                    </ul>
                    @empty
                    <li class="titulosli errorli my-5" ><i class="fas fa-exclamation-triangle"></i> No se encontro una pelicula con ese nombre</li>

                  @endforelse
                  <hr class="hrpagi">
                  {{$peliculas->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
