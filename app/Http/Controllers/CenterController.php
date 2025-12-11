<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Center;
use Illuminate\Http\Request;

use App\Services\ApiService;
use Exception;

class CenterController extends Controller
{
    protected $api;

    public function __construct()
    {
        $this->api = app(ApiService::class);
    }
  public function centers()
    {
    return view('center.center');

    }

}