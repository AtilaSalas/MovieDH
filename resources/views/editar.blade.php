@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card px-md-4">
                <div class="card-header">{{$pelicula->title}}</div>

                <div class="card-body reg">
                    <form method="POST" action="/editar/{{$pelicula->id}}">
                        @csrf

                        <div class="form-group row">

                            <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" placeholder="Título" name="titulo" value="{{$pelicula->title}}" required autocomplete="titulo" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="titulo">{{ __('Título') }}</label>


                        </div>

                        <div class="form-group-select row mb-4">
                          <label for="genre">Genero</label>
                          <select class="form-control" name="genre" id="genre">

                              @foreach ($generos as $genero)
                                <option @if ($pelicula->genre_id == $genero["id"]) selected @endif class="pl-2" value="{{$genero["id"]}}">{{$genero["name"]}}</option>
                              @endforeach

                          </select>
                        </div>

                        <div class="form-row">

                          <div class="form-group col">
                            <input type="text" id="awards" name="awards" class="form-control" placeholder="Premio" value="{{$pelicula->awards}}">
                            <label class="ml-1" for="awards">Premio</label>

                          </div>

                          <div class="form-group col">

                            <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" placeholder="Fecha de estreno" name="date" value="{{$pelicula->fechaEdit()}}" required autocomplete="date">

                              @error('date')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                              @enderror

                              <label for="date">{{ __('Fecha de estreno') }}</label>
                            </div>
                        </div>


                        <div class="form-row">
                          <div class="form-group col">
                            <input type="text" id="rating" name="rating" class="form-control" placeholder="Rating" required value="{{$pelicula->rating}}">
                            <label class="ml-1" for="rating">Rating</label>
                            <small id="emailHelp" class="form-text text-muted">Solo se adminten numeros -con decimales- del 0 al 10</small>

                          </div>

                          <div class="form-group col">
                            <input type="text" id="length" name="length" class="form-control" placeholder="Duración" required value="{{$pelicula->length}}">
                            <label class="ml-1" for="length">Duración</label>
                            <small id="emailHelp" class="form-text text-muted">Ingresar la duración en minutos.</small>
                          </div>
                        </div>

                        <div class="form-group row mb-0">

                            <button type="submit" class="btn btn-primary">
                                {{ __('Editar Pelicula') }}
                            </button>
                            <button type="submit" class="btn btn-danger" name="borrar" value="borrar">
                                {{ __('Borrar') }}
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
