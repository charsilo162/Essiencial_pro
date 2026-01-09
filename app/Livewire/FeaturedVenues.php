<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\EvenueService;
use Exception;
use Illuminate\Support\Facades\Log;

class FeaturedVenues extends Component
{
    public $venues = [];
    public $error = null;
    public $loading = true;

    public function mount(EvenueService $service)
    {
        $this->loadVenues($service);
    }

    public function loadVenues(EvenueService $service)
    {
        try {
            $this->venues = $service->getFeaturedVenues(4);
            $this->error = null;
        } catch (Exception $e) {
            Log::warning('Evenue API failed in FeaturedVenues: ' . $e->getMessage());
            $this->venues = [];
            $this->error = 'Unable to load venues right now. Please try again later.';
        } finally {
            $this->loading = false;
        }
    }

    public function render()
    {
        return view('livewire.featured-venues');
    }
}