<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Genre;

class PeliculasController extends Controller
{

    public function home()
    {
          $s = Movie::select('id')->get();

          foreach ($s as $id) {
            $arrayS[] = $id->id;
          }
          $arrayF = array_rand(  array_flip($arrayS), 5);
          $randomFive = Movie::whereIn('id', $arrayF)
                               ->get();
          $theLastFive = Movie::where("id", ">", 0)
                               ->orderBy("release_date", "DESC")
                               ->limit(5)
                               ->get();

          $vac = compact('randomFive', 'theLastFive');
          return view("home", $vac);

    }

    public function detalle($id)
    {
        $pelicula = Movie::find($id);
        $vac = compact('pelicula');
        // var_dump($pelicula->release_date);
        // die;
        return view("detalle", $vac);
    }

    public function titulo()
    {
          $peliculas = Movie::paginate(5);
          $vac = compact('peliculas');
          return view("titulos", $vac);
    }

    public function search(Request $req)
    {
          $peliculas = Movie::where('title', 'LIKE', '%' . $req["nombre"] . '%')->paginate(5);
          $vac = compact('peliculas');
          return view("titulos", $vac);
    }

    public function agregar()
    {
          $generos = Genre::all();
          $vac = compact('generos');
          return view("agregar", $vac);
    }

    public function agregarpost(Request $req)
    {

        $reglas = [
          "tiutulo" => "string|alpha_num|max:500",
          "rating" => "numeric|max:10|min:0",
          "awards" => "integer|nullable|min:0",
          "date" => "date_format:Y-m-d",
          "length" => "integer|min:0",
          "genre" => "integer"
        ];

        $mensajes = [
          "string" => "El campo :attribute solo admite texto",
          "alpha_num" => "El campo :attribute tiene caracteres invalidos",
          "max" => "Esté campo :attribute solo admite :max caracteres",
          "min" => "El campo :attribute no puede tener menos que :min",
          "numeric" => "En este campo :attribute solo se admiten numeros",
          "integer" => "El campo :attribute solo admite numero enteros",
          "date_format" => "Solo se permite el formato Y-m-d"
        ];

        $this->validate($req, $reglas, $mensajes);

        $nuevaPelicula = new Movie();

        $nuevaPelicula->title = $req["titulo"];
        $nuevaPelicula->rating = $req["rating"];
        $nuevaPelicula->awards = $req["awards"];
        $nuevaPelicula->release_date = $req["date"];
        $nuevaPelicula->length = $req["length"];
        $nuevaPelicula->genre_id = $req["genre"];

        $nuevaPelicula->save();

        $news = Movie::where("title", "=", $req["titulo"])
                              ->get();
        foreach ($news as $new) {
          $id = $new;
        }
        return redirect("/pelicula/$id->id");
    }

    public function editar($id)
    {
          $pelicula = Movie::find($id);
          $generos = Genre::all();
          $vac = compact('generos', 'pelicula');
          return view("editar", $vac);
    }

    public function editarpost($id, Request $req)
    {
      if ($req["borrar"]) {
        $pelicula = Movie::find($id);

        $pelicula->delete();
        return redirect("/titulos");
      }

        $reglas = [
          "tiutulo" => "string|alpha_num|max:500",
          "rating" => "numeric|max:10|min:0",
          "awards" => "integer|nullable|min:0",
          "date" => "date_format:Y-m-d",
          "length" => "integer|min:0",
          "genre" => "integer"
        ];

        $mensajes = [
          "string" => "El campo :attribute solo admite texto",
          "alpha_num" => "El campo :attribute tiene caracteres invalidos",
          "max" => "Esté campo :attribute solo admite :max caracteres",
          "min" => "El campo :attribute no puede tener menos que :min",
          "numeric" => "En este campo :attribute solo se admiten numeros",
          "integer" => "El campo :attribute solo admite numero enteros",
          "date_format" => "Solo se permite el formato Y-m-d"
        ];

        $this->validate($req, $reglas, $mensajes);

        $pelicula = Movie::find($id);

        $pelicula->title = $req["titulo"];
        $pelicula->rating = $req["rating"];
        $pelicula->awards = $req["awards"];
        $pelicula->release_date = $req["date"];
        $pelicula->length = $req["length"];
        $pelicula->genre_id = $req["genre"];

        $pelicula->save();

        return redirect("/pelicula/$id");
    }

    public function API(){
      $peliculas = Movie::all();
      return json_encode($peliculas);
    }
}
