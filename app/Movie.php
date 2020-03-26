<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

    public $guarded = [];

    public function genre(){
      return $this->belongsTo("App\Genre", "genre_id");
    }

    public function favorites(){
      return $this->hasMany("App\Actor", "favorite_movie_id");
    }

    public function actors(){
      return $this->belongsToMany("App\Actor", "actor_movie", "movie_id", "actor_id");
    }

    public function fecha(){
      $fecha = date_create_from_format('Y-m-d H:i:s', $this->release_date);
      return date_format($fecha, 'd-m-Y') ;
    }

    public function fechaEdit(){
      $fecha = date_create_from_format('Y-m-d H:i:s', $this->release_date);
      return date_format($fecha, 'Y-m-d') ;
    }

    public function duracion(){
      $hora = $this->length / 60;
      $hora = intval($hora);
      $min = $this->length % 60;
      if ($min == 0) {
        $min = "00";
      }
      return $hora . ":" . $min . "hrs";
    }
}
