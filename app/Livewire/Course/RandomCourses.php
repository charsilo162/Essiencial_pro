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

        $this->courses = collect($response['data'])->map(function ($course) {
            $firstVideo = $course['videos'][0] ?? null;
            $currentPrice = $course['current_price']['amount'] ?? 7000;
            $oldPrice = $currentPrice + 1000;

            return [
                'id' => $course['id'],
                'title' => $course['title'],
                'description' => $course['description'] ?? 'Course description not set.',
                'image' => $course['image_thumbnail_url'] ?? asset('storage/img3.png'),
                'badge' => 'PART ' . ($firstVideo['pivot']['order_index'] ?? 1),
                'price' => $currentPrice,
                'old_price' => $oldPrice,
            ];
        });
    }

    public function render()
    {
        return view('livewire.course.random-courses');
    }
}