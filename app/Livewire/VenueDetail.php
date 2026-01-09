<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class VenueDetail extends Component
{
    public $slug;
    public $venue = null;
    public $error = null;

    public $name = '';
    public $email = '';
    public $phone = '';
    public $message = '';
    public $submitting = false;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->loadVenue();
    }

 public function loadVenue()
{
    $cacheKey = "venue_detail_{$this->slug}";
    $this->venue = Cache::remember($cacheKey, now()->addMinutes(30), function () {
        $url = config('services.evenue.base_url') . "/getVenueBySlug/{$this->slug}";
        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json();
            // FIX: API returns venue DIRECTLY, not wrapped in 'venue' key
            return $data;  // ← This was the problem: was $data['venue']
        }

        $this->error = 'Venue not found.';
        return null;
    });
}

    public function submitInterest()
    {
        $this->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'required|string|max:20',
            'message' => 'nullable|string|max:1000',
        ]);

        $this->submitting = true;

        $payload = [
            'venueId' => $this->venue['_id'],
            'name'    => $this->name,
            'email'   => $this->email,
            'phone'   => $this->phone,
            'message' => $this->message,
        ];

        $response = Http::post(config('services.evenue.base_url') . '/createVenueInterest', $payload);

        $this->submitting = false;

        if ($response->successful()) {
            $this->dispatch('interest-sent', 'Thank you! We’ll contact you soon.');
            $this->reset(['name', 'email', 'phone', 'message']);
        } else {
            $this->addError('email', 'Failed to send interest. Try again.');
        }
    }

    public function render()
    {
        return view('livewire.venue-detail')->layout('layouts.app');
    }
}