<?php

namespace App\Livewire\Course;

use Livewire\Component;
use Illuminate\Support\Collection;
 use App\Services\ApiService;
class CourseWatch extends Component
{
    public ?array $course = null;
    public ?array $currentVideo = null;
    public Collection $videos;           // ← Now correct type
    public ?int $videoId = null;
    public int $playerKey = 0;
    protected $queryString = [
        'videoId' => ['except' => null, 'as' => 'v'],
    ];
   

   protected $api;

    public function boot()
    {
        $this->api = app(ApiService::class);
    }

   public function mount(string $slug)
{
    $response = $this->api->get("courses/{$slug}/watch");
// dd($response);
    if (isset($response['message']) && str_contains($response['message'], 'enrolled')) {
        return redirect()->route('category.index')->with('error', 'You must enroll to watch this course.');
    }

    $this->course = $response['data'];
    $this->videos = collect($this->course['videos'] ?? []);
//dd($this->course);
    $this->setCurrentVideo($this->videoId);
}
    public function setCurrentVideo(?int $id)
    {
        $video = $this->videos->firstWhere('id', $id);

        if (!$video && $this->videos->isNotEmpty()) {
            $video = $this->videos->first();
        }

        $this->currentVideo = $video;
        $this->videoId = $video['id'] ?? null;
        $this->playerKey++;
    }

    public function render()
    {
        return view('livewire.course.course-watch');
    }
}