<?php

namespace App\Livewire\Video;

use App\Services\ApiService;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class MyVideos extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $showEditModal = false;
    public $editVideoId = null;
    public $editTitle = '';
    public $editDuration = '';
    public $editThumbnail;
    public $editVideoFile;

    protected $queryString = ['search' => ['except' => '']];
    protected $listeners = ['video-updated' => 'refreshVideos', 'video-deleted' => 'refreshVideos'];

    public function updatingSearch()
    {
        $this->resetPage();
    }
    protected $api;

    public function boot()
    {
        $this->api = new ApiService();
    }

    public function togglePublish($videoId)
    {
        $this->api->put("videos/{$videoId}/toggle-publish");
        $this->dispatch('toast', 'Video status updated!');
    }

    public function openEditModal($videoId)
    {
        
        $response = $this->api->get("videos/{$videoId}");
        $video = $response['data'];
        $this->editVideoId = $video['id'];
        $this->editTitle = $video['title'];
        $this->editDuration = $video['duration'];
        $this->showEditModal = true;
        $this->dispatch('open-modal', 'edit-video-modal');
    }

    public function closeEditModal()
    {
        $this->showEditModal = false;
        $this->reset(['editVideoId', 'editTitle', 'editDuration', 'editThumbnail', 'editVideoFile']);
        $this->dispatch('close-modal', 'edit-video-modal');
    }

public function updateVideo()
{
    $this->validate([
        'editTitle' => 'required|string|max:255',
        'editDuration' => 'nullable|integer|min:1',
        'editThumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        'editVideoFile' => 'nullable|file|mimes:mp4,mov,avi,wmv|max:102400',
    ]);

    // 1. Prepare data in the structure your ApiService.multipartRequest expects
    $data = [
        ['name' => 'title', 'contents' => $this->editTitle],
        ['name' => 'duration', 'contents' => $this->editDuration],
    ];

    // 2. Attach Thumbnail if exists
    if ($this->editThumbnail) {
        $data[] = [
            'name'     => 'thumbnail_file',
            'contents' => fopen($this->editThumbnail->getRealPath(), 'r'),
            'filename' => $this->editThumbnail->getClientOriginalName(),
        ];
    }

    // 3. Attach Video if exists
    if ($this->editVideoFile) {
        $data[] = [
            'name'     => 'video_file',
            'contents' => fopen($this->editVideoFile->getRealPath(), 'r'),
            'filename' => $this->editVideoFile->getClientOriginalName(),
        ];
    }

    // 4. CALL putWithFile (This uses multipart + method spoofing)
    $response = $this->api->putWithFile("videos/{$this->editVideoId}", $data);

    if (isset($response['error'])) {
        $this->dispatch('toast', 'Update failed: ' . ($response['message'] ?? 'Error'));
    } else {
        $this->dispatch('toast', 'Video updated successfully!');
        $this->dispatch('video-updated');
        $this->closeEditModal();
    }
}
    public function deleteVideo($videoId)
    {
        $this->api->delete("videos/{$videoId}");
        $this->dispatch('toast', 'Video deleted!');
        $this->dispatch('video-deleted');
    }

    public function refreshVideos()
    {
        $this->resetPage();
    }

public function render()
{
    $params = ['page' => $this->getPage()];
    if ($this->search !== '') {
        $params['search'] = $this->search;
    }

    $response = $this->api->get('videos', $params);
// dd($response );
    return view('livewire.video.my-videos', [
        'videos' => $response, // ← full response with 'data', 'links', 'meta'
    ]);
}
}