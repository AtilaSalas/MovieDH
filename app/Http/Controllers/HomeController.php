<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Genre;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $random = rand(1,21);
      $random1 = rand(1,21);
      $random2 = rand(1,21);
      $random3 = rand(1,21);
      $random4 = rand(1,21);
      $randomFive = Movie::where("id", ">", 0)
                           ->orderBy("title")
                           ->get();
      $theLastFive = Movie::where("id", ">", 0)
                           ->orderBy("release_date", "DESC")
                           ->limit(5)
                           ->get();
                        // $chunk = $randomFive->chunk(5);
                        //      dd($chunk[0]);

      $vac = compact('randomFive', 'theLastFive');
      return view("home", $vac);
    }
}
