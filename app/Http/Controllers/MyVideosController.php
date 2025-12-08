<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyVideosController extends Controller
{
      public function Index()
    {
        
            return view('video.show');

    }

          public function draft()
    {
        
            return view('video.draftvideo');

    }
}
