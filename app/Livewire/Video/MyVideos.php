<?php

namespace App\Livewire\Video;

use App\Services\ApiService;
use Livewire\Component;
use Livewire\WithPagination;

class MyVideos extends Component
{
    use WithPagination;

    public $search = '';
    public $showEditModal = false;
    public $editVideoId = null;
    public $editTitle = '';
    public $editDuration = '';

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
        $this->reset(['editVideoId', 'editTitle', 'editDuration']);
        $this->dispatch('close-modal', 'edit-video-modal');
    }

    public function updateVideo()
    {
        $this->validate([
            'editTitle' => 'required|string|max:255',
            'editDuration' => 'nullable|integer|min:1',
        ]);

        $this->api->put("videos/{$this->editVideoId}", [
            'title' => $this->editTitle,
            'duration' => $this->editDuration,
        ]);

        $this->dispatch('toast', 'Video updated!');
        $this->dispatch('video-updated');
        $this->closeEditModal();
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