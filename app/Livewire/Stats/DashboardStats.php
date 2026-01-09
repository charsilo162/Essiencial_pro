<?php

namespace App\Livewire\Stats;

use App\Services\ApiService;
use Livewire\Component;

class DashboardStats extends Component
{
    protected $api;
    public $stats;


    public function boot()
    {
        $this->api = app(ApiService::class);
    }

    public function mount()
    {
        // Fetch stats from the /stats endpoint
        $response = $this->api->get('stats');

       // dd($response);
        $this->stats = $response['data'];
    }

    public function render()
    {
        return view('livewire.stats.dashboard-stats');
    }
}