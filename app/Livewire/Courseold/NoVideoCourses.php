<?php

namespace App\Livewire\Course;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Course;
use App\Services\ApiService;
use Illuminate\Pagination\LengthAwarePaginator;

class NoVideoCourses extends Component
{
    use WithPagination;

    public $search = '';
    public $showAddVideoModal = false;
    public $selectedCourseId = null;

    protected $queryString = ['search' => ['except' => '']];
    protected $listeners = ['video-added' => 'refreshCourses'];
   protected $api;

    public function boot()
    {
        $this->api = app(ApiService::class);
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function openAddVideoModal($courseId)
    {
        $this->selectedCourseId = $courseId;
        $this->showAddVideoModal = true;
        $this->dispatch('open-modal', 'add-first-video-modal');
    }

    public function closeAddVideoModal()
    {
        $this->showAddVideoModal = false;
        $this->selectedCourseId = null;
        $this->dispatch('close-modal', 'add-first-video-modal');
    }

    public function publish($courseId)
    {
        $this->api->put("courses/{$courseId}/publish");
        $this->dispatch('toast', 'Course published!');
        $this->resetPage();
    }

    public function refreshCourses()
    {
        $this->resetPage();
    }



public function render()
{
    $params = ['page' => $this->getPage()];
    if ($this->search) {
        $params['search'] = $this->search;
    }

    $response = $this->api->get('courses/without-videos', $params);

    $coursesArray = $response['data'] ?? [];

    $courses = new LengthAwarePaginator(
        collect($coursesArray),
        $response['meta']['total'] ?? count($coursesArray),
        $response['meta']['per_page'] ?? 12,
        $response['meta']['current_page'] ?? 1,
        [
            'path' => request()->url(),
            'query' => request()->query(),
        ]
    );

    return view('livewire.course.no-video-courses', [
        'courses' => $courses,
    ]);
}

}