<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Like;
use App\Services\ApiService;
use Illuminate\Support\Facades\Auth;

class InteractionPanel extends Component
{
    // Renamed properties for clarity, matching the 'Like' model columns
    public $likeableId;
    public $likeableType; 

    public $upVoteCount = 0;
    public $downVoteCount = 0;
    
    // Tracks the current authenticated user's vote status: 'up', 'down', or null
    public $userVoteType = null;

    /**
     * Initializes the component and fetches initial counts and user status.
     */
        protected $api;

    public function boot()
    {
        $this->api = app(ApiService::class);
    }

public function mount($resourceId, $resourceType)
{
    $this->likeableId = $resourceId;
    $this->likeableType = $resourceType;
    $this->refreshVotes();
}


    /**
     * Handles the user clicking 'up' or 'down'.
     * @param string $type 'up' or 'down'
     */
public function refreshVotes()
{
    $response = $this->api->get('likes', [ // ← REMOVED .withToken()
        'resource_type' => $this->likeableType,
        'resource_id'   => $this->likeableId,
    ]);

    $this->upVoteCount = $response['up_count'] ?? 0;
    $this->downVoteCount = $response['down_count'] ?? 0;
    $this->userVoteType = $response['user_vote'] ?? null;
}

public function vote($type)
{
 
     if (!session('user')) {
        $this->dispatch('toast', 'Please log in to vote.');
        return;
    }

  $dd =  $this->api->post('likes/toggle', [ // ← REMOVED .withToken()
        'resource_type' => $this->likeableType,
        'resource_id'   => $this->likeableId,
        'type'          => $type,
    ]);
//  dd(  $dd);
    $this->refreshVotes();
    $this->dispatch('toast', 'Vote recorded!');
}
    public function render()
    {
        return view('livewire.interaction-panel');
    }
}
