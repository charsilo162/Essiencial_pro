<?php
namespace App\Livewire\Course;

use App\Services\ApiService;
use Livewire\Component;

class RandomCourses extends Component
{
    public $courses = [];

    protected $api;

    public function boot()
    {
        $this->api = new ApiService();
    }

    public function mount()
    {
        $response = $this->api->get('courses', [
            'random' => true,
            'limit' => 4,
        ]);
        //dd($response);
        // Removed dd($response); to allow the component to proceed

        $this->courses = collect($response['data'])->map(function ($course) {
            $firstVideo = $course['videos'][0] ?? null;
            $currentPrice = $course['current_price']['amount'] ?? 7000;
            $oldPrice = $currentPrice + 1000;

            // Compute the dynamic URL based on course type
            $url = ($course['type'] === 'online')
                ? route('courses.online', ['course' => $course['slug']])
                : route('courses.center', ['center' => $course['centers'][0]['id'] ?? 0, 'course' => $course['slug']]); // Assumes hybrid is treated like physical; adjust if needed
$part = $firstVideo['pivot']['order_index'] ?? 1;
if($part == 0){
$part = $part + 1;
}
            return [
                'id' => $course['id'],
                'title' => $course['title'],
                'description' => $course['description'] ?? 'Course description not set.',
                'image' => $course['image_thumbnail_url'] ?? asset('storage/img3.png'),
                'badge' => 'PART ' . $part,
                'price' => $currentPrice,
                'old_price' => $oldPrice,
                'url' => $url, // Added dynamic URL
            ];
        });
    }

    public function render()
    {
        return view('livewire.course.random-courses');
    }
}