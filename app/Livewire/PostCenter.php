<?php

namespace App\Livewire;

use App\Services\ApiService;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostCenter extends Component
{
    use WithFileUploads;

    public $name;
    public $address;
    public $description;
    public $city;
    public $years_of_experience;
    public $center_thumbnail_url;
    public $showModal = false;

    protected $listeners = [
        'openPostCenterModal' => 'openModal',
    ];

    protected $api;

    public function boot()
    {
        $this->api = new ApiService();
    }

    public function openModal()
    {
        $this->reset(); // Clear any previous data
        $this->resetErrorBag();
        $this->showModal = true;
    }

    public function getRules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'years_of_experience' => 'required|integer|min:0',
            'center_thumbnail_url' => 'nullable|image|max:1024',
        ];
    }

    public function postCenter()
    {
        $this->validate($this->getRules());

        $data = [
            ['name' => 'name', 'contents' => $this->name],
            ['name' => 'address', 'contents' => $this->address],
            ['name' => 'description', 'contents' => $this->description ?? ''], // Handle nullable
            ['name' => 'city', 'contents' => $this->city],
            ['name' => 'years_of_experience', 'contents' => $this->years_of_experience],
        ];

        if ($this->center_thumbnail_url) {
            $data[] = [
                'name' => 'center_thumbnail_url',
                'contents' => fopen($this->center_thumbnail_url->getRealPath(), 'r'),
                'filename' => $this->center_thumbnail_url->getClientOriginalName(),
            ];
        }

        $response = $this->api->postWithFile('centers', $data);

        // Error handling
        if (!empty($response['error'])) {
            $this->dispatch('error-notification', message: $response['message'] ?? 'Failed to post center');
            return; // Don't close modal on error
        }

        $this->reset([
            'name',
            'address',
            'description',
            'city',
            'years_of_experience',
            'center_thumbnail_url'
        ]);

        $this->showModal = false;

        $this->dispatch(
            'success-notification',
            message: '🥳 Success! Your training center has been posted.',
            type: 'center'
        );
    }

    public function render()
    {
        return view('livewire.post-center');
    }
}