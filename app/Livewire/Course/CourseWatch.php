<?php

namespace App\Livewire\Course;

use Livewire\Component;
use Illuminate\Support\Collection;
 use App\Services\ApiService;
class CourseWatch extends Component
{
    public ?array $course = null;
    public ?array $currentVideo = null;
    public Collection $videos;
    public ?int $videoId = null;

    protected $queryString = [
        'videoId' => ['except' => null, 'as' => 'v'],
    ];

    protected ApiService $api;

    public function boot()
    {
        $this->api = app(ApiService::class);
    }

    public function mount(string $slug)
    {
        $response = $this->api->get("courses/{$slug}/watch");

        if (isset($response['message']) && str_contains($response['message'], 'enrolled')) {
            return redirect()
                ->route('category.index')
                ->with('error', 'You must enroll to watch this course.');
        }
// dd($response);
if (isset($response['message'])) {
          return redirect()
                ->route('category.index')
                ->with('error', 'Course not found or inaccessible.');

        }
        $this->course = $response['data'];
        $this->videos = collect($this->course['videos'] ?? []);

        // ✅ Select video from query string OR default to first
        $this->setCurrentVideo($this->videoId);
    }

    public function setCurrentVideo(?int $id)
    {
        $video = $this->videos->firstWhere('id', $id)
            ?? $this->videos->first();

        $this->currentVideo = $video;
        $this->videoId = $video['id'] ?? null;
    }

    public function render()
    {
        return view('livewire.course.course-watch');
    }
}
