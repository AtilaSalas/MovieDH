@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{$pelicula->title}}</div>

                <div class="card-body">


                    <h3>Actores:</h3>
                      <ul>
                        @forelse ($pelicula->actors as $actor)
                          <li>{{$actor->nombreCompleto()}}</li>
                        @empty
                          <li>No hay actores registrados</li>
                        @endforelse
                      </ul>

                    @if ($pelicula->genre)
                      <h3>Genero: {{$pelicula->genre->name}}</h3>
                    @endif

                    <h3>Fecha de estreno: {{$pelicula->fecha()}}</h3>

                    <h3>Rating: {{$pelicula->rating}}</h3>

                    <h3>Premios: {{$pelicula->awards}}</h3>

                    @if ($pelicula->length)
                      <h3>Duracion: {{$pelicula->duracion()}}</h3>
                    @endif
                    <hr>
                    @guest
                    @else
                      @if (Auth::user()->rol_id == 2)

                          <a href="http://localhost:8000/editar/{{$pelicula->id}}"> <button type="submit" class="btn btn-primary">
                            {{ __('Editar pelicula') }}
                          </button></a>

                      @endif
                    @endguest
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
