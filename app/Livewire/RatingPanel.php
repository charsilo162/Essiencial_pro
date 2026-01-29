<?php

namespace App\Livewire;

namespace App\Livewire;

use Livewire\Component;
use App\Services\ApiService;

class RatingPanel extends Component
{
    public $rateableId;
    public $rateableType;

    public $average = 0;
    public $count = 0;
    public $userRating = null;

    protected $api;

    public function boot()
    {
        $this->api = app(ApiService::class);
    }

    public function mount($resourceId, $resourceType)
    {
        // 🔁 Keep naming consistent with InteractionPanel
        $this->rateableId   = $resourceId;
        $this->rateableType = $resourceType;

        $this->refresh();
    }

    public function refresh()
    {
        $data = $this->api->get('ratings', [
            'resource_type' => $this->rateableType,
            'resource_id'   => $this->rateableId,
        ]);

        $this->average    = $data['average'] ?? 0;
        $this->count      = $data['count'] ?? 0;
        $this->userRating = $data['user_rating'] ?? null;
    }

    public function rate($value)
    {
        // dd($value);
        if (!session('user')) {
            $this->dispatch('toast', 'Please log in to rate.');
            return;
        }

      $dd =  $this->api->post('ratings/rate', [
            'resource_type' => $this->rateableType,
            'resource_id'   => $this->rateableId,
            'rating'        => $value,
        ]);
//  dd($dd);
        $this->refresh();
        $this->dispatch('toast', 'Thanks for rating!');
    }

    public function render()
    {
        return view('livewire.rating-panel');
    }
}

