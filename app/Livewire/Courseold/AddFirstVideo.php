<?php

namespace App\Livewire\Course;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Video;
use App\Models\Course;
use App\Services\ApiService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AddFirstVideo extends Component
{
    use WithFileUploads;

    public $courseId;
    public $title = '';
    public $video_file;
    public $thumbnail_file;
    public $duration;
  protected $api;
public function boot()
{
    $this->api = app(ApiService::class);
}
  
    protected $rules = [
        'title'          => 'required|string|max:255',
        'video_file'     => 'required|file|mimes:mp4,mov,avi,wmv|max:102400',
        'thumbnail_file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'duration'       => 'nullable|integer|min:1',
    ];

    
    public function mount($courseId)
    {
        $this->courseId = $courseId;
    }

    public function save()
{
    $this->validate();

    $data = [
        ['name' => 'course_id', 'contents' => $this->courseId],
        ['name' => 'title', 'contents' => $this->title],
        ['name' => 'order_index', 'contents' => 0],
        ['name' => 'video_file', 'contents' => fopen($this->video_file->getRealPath(), 'r'), 'filename' => $this->video_file->getClientOriginalName()],
    ];

    if ($this->thumbnail_file) {
        $data[] = ['name' => 'thumbnail_file', 'contents' => fopen($this->thumbnail_file->getRealPath(), 'r'), 'filename' => $this->thumbnail_file->getClientOriginalName()];
    }

    if ($this->duration) {
        $data[] = ['name' => 'duration', 'contents' => $this->duration];
    }

    try {
       
      \Log::info('FILES:', $data);
    // \Log::info('INPUT:', $request->all());
        $this->api->postWithFile('videos', $data);
        $this->reset(['title', 'video_file', 'thumbnail_file', 'duration']);
        $this->dispatch('success-notification', message: 'First video uploaded successfully.', type: 'video');
        $this->dispatch('video-added');
        $this->dispatch('close-modal', 'add-first-video-modal');
    } catch (\Exception $e) {
        $this->addError('video_file', 'Upload failed. Please try again.');
        Log::error('Video upload failed: ' . $e->getMessage());
    }
}
    public function render()
    {
        return view('livewire.course.add-first-video');
    }
}
