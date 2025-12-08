<?php

namespace App\Livewire;

use App\Services\ApiService;
use Livewire\Component;
use Livewire\WithPagination;

class CommentSection extends Component
{
    use WithPagination;

    public $resourceId;
    public $resourceType;
    public $newCommentText = '';

    protected $rules = [
        'newCommentText' => 'required|string|min:3|max:500',
    ];

    protected $api;

    public function boot()
    {
        $this->api = app(ApiService::class);
    }

    public function mount($resourceId, $resourceType)
    {
        $this->resourceId = $resourceId;
        $this->resourceType = $resourceType;
    }

public function postComment()
{
    if (!session('user')) {
        $this->dispatch('toast', message: 'Please log in to comment.');
        return;
    }

    $this->validate();

    $this->api->post('comments', [
        'resource_type' => $this->resourceType,
        'resource_id'   => $this->resourceId,
        'body'          => $this->newCommentText,
    ]);

    // THIS IS THE NUCLEAR WINNING COMBO
    $this->newCommentText = '';
    $this->reset('newCommentText');
    $this->dispatch('clear-comment-input'); // Optional: extra safety

    $this->resetPage();
    $this->dispatch('toast', message: 'Comment posted successfully!');
}
public function render()
{
    $response = $this->api->get('comments', [
        'resource_type' => $this->resourceType,
        'resource_id'   => $this->resourceId,
        'page'          => $this->getPage(), // ← THIS IS THE MAGIC LINE
    ]);
// dd($response);
    // Convert to real Laravel paginator
    $comments = new \Illuminate\Pagination\LengthAwarePaginator(
        collect($response['data'] ?? []),
        $response['meta']['total'] ?? 0,
        $response['meta']['per_page'] ?? 10,
        $response['meta']['current_page'] ?? 1,
        [
            'path' => request()->url(),
            'query' => request()->query(),
        ]
    );
// dd($comments);
    return view('livewire.comment-section', [
        'comments' => $comments,
    ]);
}
}