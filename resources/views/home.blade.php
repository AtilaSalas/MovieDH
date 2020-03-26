@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Peliculas Recomendadas</div>

                <div class="card-body">

                  @foreach ($randomFive as $pelicula)
                    <li><a href="http://localhost:8000/pelicula/{{$pelicula->id}}">{{$pelicula->title}}</a></li>
                  @endforeach

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Las Ultimas Peliculas</div>

                <div class="card-body">

                  @foreach ($theLastFive as $pelicula5)
                    <li><a href="http://localhost:8000/pelicula/{{$pelicula5->id}}">{{$pelicula5->title}}</a></li>
                  @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
