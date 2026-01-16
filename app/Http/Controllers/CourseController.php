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

        // If API returned readable error
        if (!$init['success']) {
            return redirect()
                ->route('courses.online', $slug)
                ->with('error', $init['error']);
        }
//         dump('yese');
//   dd($init);
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
        //dd($course);
    if ($course['type'] !== 'online') {
        route('courses.center', [$course['id'],$course['slug']]);
    }

    // 👇 Capture messages from query string
    $success = request()->query('success');
    $error   = request()->query('error');
    $course['tags'] = [$course['category']['name'], $course['type']];
 //dd($course);
    return view('courses.show', compact('course', 'success', 'error'));
}


    public function showCenter($centerId, $slug)
    {
        $response = $this->api->get("courses/{$slug}");
      // 👇 Capture messages from query string
    $success = request()->query('success');
    $error   = request()->query('error');
        if (isset($response['message'])) {
            abort(404);
        }

        $course = $response['data'] ?? $response;

        $center = collect($course['centers'] ?? [])->firstWhere('id', $centerId);

        if (!$center || !in_array($course['type'], ['physical', 'hybrid'])) {
            abort(404);
        }
    //$course['tags'] = [$course['category']['name'], $course['type']];
        return view('courses.show-center', compact('course', 'center'));
    }
}
