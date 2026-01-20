<?php

namespace App\Livewire\Course;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\ApiService;
use Illuminate\Support\Facades\Log;

class AddVideoToCourse extends Component
{
    use WithFileUploads;

    public $showModal = false;
    public $courses = [];
    public $selectedCourseId = '';
    public $title = '';
    public $video_file = null;
    public $thumbnail_file = null;
    public $duration = null;
    public $order_index = 1;

    protected $api;

    public function boot()
    {
        $this->api = app(ApiService::class);
    }

 protected $rules = [
    // Change this line:
    'selectedCourseId' => 'required|integer', 
    'title'            => 'required|string|max:255',
    'video_file'       => 'required|file|mimes:mp4,mov,avi,wmv|max:102400',
    'thumbnail_file'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    'duration'         => 'nullable|integer|min:1',
    'order_index'      => 'required|integer|min:1',
];

    protected $listeners = ['open-add-video-modal' => 'openWithCourse'];

    public function mount()
    {
        $this->loadCourses();
    }

    public function loadCourses()
    {
        try {
            $response = $this->api->get('courses'); // Assume API endpoint '/courses' returns a list of courses with 'id', 'title', 'videos_count'
            $this->courses = collect($response['data'] ?? $response)
                ->map(function ($c) {
                    return [
                        'id' => $c['id'],
                        'title' => $c['title'],
                        'video_count' => $c['videos_count'] ?? 0,
                        'next_order' => ($c['videos_count'] ?? 0) + 1,
                    ];
                })
                ->sortBy('title')
                ->values()
                ->toArray();
        } catch (\Exception $e) {
            Log::error('Failed to load courses: ' . $e->getMessage());
            $this->courses = []; // Fallback to empty array on error
        }
    }

    public function updatedSelectedCourseId()
    {
        $course = collect($this->courses)->firstWhere('id', $this->selectedCourseId);
        $this->order_index = $course['next_order'] ?? 1;
    }

    public function openModal() { $this->showModal = true; }

    public function openWithCourse($courseId)
    {
        $this->selectedCourseId = $courseId;
        $this->updatedSelectedCourseId();
        $this->openModal();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['selectedCourseId', 'title', 'video_file', 'thumbnail_file', 'duration', 'order_index']);
    }

    public function save()
    {
        $this->validate();

        $data = [
            ['name' => 'course_id', 'contents' => $this->selectedCourseId],
            ['name' => 'title', 'contents' => $this->title],
            ['name' => 'order_index', 'contents' => $this->order_index],
            ['name' => 'video_file', 'contents' => fopen($this->video_file->getRealPath(), 'r'), 'filename' => $this->video_file->getClientOriginalName()],
        ];

        if ($this->thumbnail_file) {
            $data[] = ['name' => 'thumbnail_file', 'contents' => fopen($this->thumbnail_file->getRealPath(), 'r'), 'filename' => $this->thumbnail_file->getClientOriginalName()];
        }

        if ($this->duration) {
            $data[] = ['name' => 'duration', 'contents' => $this->duration];
        }
    try {
        $response = $this->api->postWithFile('videos', $data);

        // Check if the API returned validation errors
        if (isset($response['error']) && $response['status'] === 422) {
            foreach ($response['errors'] as $field => $messages) {
                // Map 'course_id' from API back to 'selectedCourseId' in Livewire
                $livewireField = ($field === 'course_id') ? 'selectedCourseId' : $field;
                $this->addError($livewireField, $messages[0]);
            }
            return;
        }

            $this->dispatch('success-notification', message: "Video added!", type: 'video');
            $this->closeModal();
            $this->loadCourses();

        } catch (\Exception $e) {
            Log::error('Video upload failed: ' . $e->getMessage());
            $this->addError('video_file', 'Upload failed. Check your server file size limits.');
        }
    }

    public function render()
    {
        return view('livewire.course.add-video-to-course');
    }
}