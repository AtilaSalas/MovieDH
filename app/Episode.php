<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{

    public $guarded = [];

    public function season(){
      return $this->belongsTo("App\Season", "season_id");
    }
}
