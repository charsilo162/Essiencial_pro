<?php

namespace App\Livewire;

use Livewire\Component;

class SubscribeForm extends Component
{
    public $fullName = '';
    public $email = '';
    public $message = ''; // For success/error message

    protected $rules = [
        'fullName' => 'required|min:3',
        'email' => 'required|email|unique:subscribers,email', // Adjust unique rule to your table
    ];

    public function submit()
    {
        $this->validate();

        // **Add your subscription logic here**
        // e.g., Subscriber::create(['full_name' => $this->fullName, 'email' => $this->email]);
        
        $this->reset(['fullName', 'email']);
        $this->message = 'Thank you for subscribing!';

        // Flash message for a few seconds if needed
        // $this->dispatch('close-message');
    }

    public function render()
    {
        return view('livewire.subscribe-form');
    }
}