<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{

    public $guarded = [];

    public function episodes(){
      return $this->hasMany("App\Episode", "season_id");
    }

    public function serie(){
      return $this->belongsTo("App\Serie", "serie_id");
    }
}
