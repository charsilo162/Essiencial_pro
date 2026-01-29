<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Center;
use Illuminate\Http\Request;

use App\Services\ApiService;
use Exception;

class CourseController extends Controller
{
    protected $api;

    public function __construct()
    {
        $this->api = app(ApiService::class);
    }
  public function mycourse()
    {
    return view('courses.mycourse');

    }

  public function buy($slug)
{
    $response = $this->api->get("courses/{$slug}");

    if (isset($response['message']) || empty($response['data']['id'])) {
        abort(404);
    }

    $course = $response['data'];
    $courseId = $course['id'];
  
    try {
        $init = $this->api->initializePayment($courseId);
  //dd($init);
        // If API returned readable error
        if (!$init['success']) {
            return redirect()
                ->route('courses.online', $slug)
                ->with('error', $init['error']);
        }
//         dump('yese');
 
        // Success – redirect to Paystack auth URL
        if (isset($init['data']['authorization_url'])) {
            return redirect($init['data']['authorization_url']);
        }

        throw new Exception('Payment initialization failed.');

    } catch (Exception $e) {

        // \Log::error("Paystack Initialization Error: " . $e->getMessage());

        return redirect()
            ->route('courses.online', $slug)
            ->with('error', $e->getMessage());
    }
}


public function showOnline($slug)
{
    $response = $this->api->get("courses/{$slug}");

    if (isset($response['message'])) {
        abort(404);
    }

    $course = $response['data'] ?? $response;

    if ($course['type'] !== 'online') {
        route('center.show', $course['id']);
    }

    // 👇 Capture messages from query string
    $success = request()->query('success');
    $error   = request()->query('error');

    return view('courses.show', compact('course', 'success', 'error'));
}
 

    public function showCenter($centerId, $slug)
    {
        $response = $this->api->get("courses/{$slug}");

        if (isset($response['message'])) {
            abort(404);
        }

        $course = $response['data'] ?? $response;

        $center = collect($course['centers'] ?? [])->firstWhere('id', $centerId);
       // dd($course);
        if (!$center || !in_array($course['type'], ['physical', 'hybrid'])) {
            abort(404);
        }

        return view('courses.show-center', compact('course', 'center'));
    }
}
