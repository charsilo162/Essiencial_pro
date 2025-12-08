<?php

namespace App\Livewire\Center;

use App\Services\ApiService;
use Livewire\Component;

class OurLocations extends Component
{
      protected $api;
public function boot()
{
    $this->api = app(ApiService::class);
}
    public function render()
    {
        // Fetch at least 10 centers using the API, leveraging the 'featured' flag for ordering by years_of_experience desc
        // Adjust 'limit' as needed; here set to 10 for "at least 10"
        $response = $this->api->get('centers', ['featured' => true, 'limit' => 10]);
        $centers = $response['data'];

        return view('livewire.center.our-locations', compact('centers'));
    }
}







