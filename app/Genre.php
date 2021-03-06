<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{

    public $guarded = [];

    public function movies(){
      return $this->hasMany("App\Movie", "genre_id");
    }

    public function series(){
      return $this->hasMany("App\Serie", "genre_id");
    }
}
