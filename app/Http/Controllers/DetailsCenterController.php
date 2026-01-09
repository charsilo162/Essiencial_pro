<?php

namespace App\Http\Controllers;

use App\Models\Center;
use Illuminate\Http\Request;
use App\Services\ApiService;

class DetailsCenterController extends Controller
{
    protected $api;

    public function details_center($id)
    {
        $this->api = new ApiService();
        $response = $this->api->get("centers/{$id}");
        $center = $response['data']; // Extract the inner array
// dd($center);
        // $center = Center::findOrFail($id); // Uncomment if switching back to model

        return view('center.details_center', ['center' => $center]);
    }
}