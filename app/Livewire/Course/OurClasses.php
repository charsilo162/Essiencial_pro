<?php

namespace App\Livewire\Course;
use Livewire\Component;
use App\Services\ApiService;
class OurClasses extends Component
{
    protected $api;

    public array $classTypes = [
        'online' => [
            'title' => 'Virtual Classes',
            'description' => 'Join our interactive virtual lessons from anywhere in the world.',
            'color' => 'bg-blue-600',
            'featured' => null, // Will hold fetched course data
            'count' => 0,
        ],
        'physical' => [
            'title' => 'Physical Classes',
            'description' => 'Learn onsite with hands-on experience from certified instructors.',
            'color' => 'bg-orange-500',
            'featured' => null,
            'count' => 0,
        ],
        'hybrid' => [
            'title' => 'Hybrid Classes',
            'description' => 'Enjoy a flexible mix of virtual and physical learning.',
            'color' => 'bg-blue-600',
            'featured' => null,
            'count' => 0,
        ],
    ];

    public function boot()
    {
        $this->api = app(ApiService::class);
    }

    public function mount()
    {
        foreach ($this->classTypes as $type => &$data) {
            // Fetch one random published course for thumbnail (reuse index endpoint)
            $response = $this->api->get('courses', [
                'type' => $type,
                'limit' => 1,
                'random' => true,
                'include_unpublished' => false, // Only published
            ]);
            $data['featured'] = collect($response['data'] ?? [])->first();

            // Fetch count separately (use a count endpoint if you have one; otherwise, fetch without limit and count)
            $countResponse = $this->api->get('courses', [
                'type' => $type,
                'include_unpublished' => false,
            ]);
            $data['count'] = count($countResponse['data'] ?? []);
        }
    }

    public function render()
    {
        return view('livewire.course.our-classes');
    }
}
