<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Course; // Can remove if not needed (we'll fetch via API)
use App\Services\ApiService; // Add this for API calls

class CourseWatchController extends Controller
{
    protected $api;

    public function __construct(ApiService $api)
    {
        $this->api = $api;
    }

    /**
     * Handles the request for the course watch page.
     *
     * @param  string  $slug The course slug from the route.
     * @return \Illuminate\Contracts\View\View
     */
    public function CourseWatch($slug)
    {
        // dd($slug);
        // Fetch course from backend API using slug (similar to showOnline)
        $response = $this->api->get("courses/{$slug}");
// dd($response);
        if (isset($response['message'])) {
            abort(404, 'Course not found.');
        }

        $course = $response['data'] ?? $response;

        // Pass to view (Livewire will use course ID from this)
        return view('courses.watch', [
            'course' => $course
        ]);
    }
}