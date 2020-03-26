<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{

      public $guarded = [];

      public function favorite(){
        return $this->belongsTo("App\Movie", "favorite_movie_id");
      }

      public function movies(){
        return $this->belongsToMany("App\Pelicula", "actor_movie", "actor_id", "movie_id");
      }

      public function nombreCompleto(){
        return $this->first_name . " " . $this->last_name; 
      }
}
