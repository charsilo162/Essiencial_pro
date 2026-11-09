<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\ApiService;

class NewsSubscriber extends Component
{
    public $email = '';
    public $message = '';
    public $status = ''; // 'success' or 'error'

    protected $api;

    /**
     * Dependency Injection via Boot method 
     * Matches your RatingPanel pattern
     */
    public function boot()
    {
        $this->api = app(ApiService::class);
    }

    /**
     * Rules optimized for the frontend validation before hitting the API
     */
    protected $rules = [
        'email' => 'required|email',
    ];

    public function submitSubscription()
    {
        $this->validate();

        try {
            // 🚀 Using your custom ApiService wrapper
            $response = $this->api->post('subscribe', [
                'email' => $this->email,
            ]);

            // Assuming your ApiService returns an array or throws exceptions automatically on failure.
            // If it returns raw responses, you can adjust this check accordingly.
            if (isset($response['status']) && $response['status'] === 'success') {
                $this->status = 'success';
                $this->message = $response['message'] ?? 'Thank you for subscribing!';
                $this->reset('email'); // Clear the input field on success
                
                // Optional: Use your toast system if you have one globally registered
                $this->dispatch('toast', $this->message);
            } else {
                $this->status = 'error';
                $this->message = $response['message'] ?? 'Something went wrong.';
            }

        } catch (\Exception $e) {
            // Handles any connection dropouts or 422 validation exceptions thrown by ApiService
            $this->status = 'error';
            $this->message = $e->getMessage() ?: 'Could not process your subscription at this time.';
            
            // Optional: Dispatch a toast error
            $this->dispatch('toast', $this->message);
        }
    }

    public function render()
    {
        return view('livewire.news-subscriber');
    }
}