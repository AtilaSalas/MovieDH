<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{

    public $guarded = [];

    public function genre(){
      return $this->belongsTo("App\Genre", "genre_id");
    }

    public function episodes(){
      return $this->hasMany("App\Season", "serie_id");
    }
}
