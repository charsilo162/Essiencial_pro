<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmitted;

class ContactForm extends Component
{
    public $name = '';
    public $email = '';
    public $subject = '';
    public $message = '';

    protected $rules = [
        'name'    => 'required|string|min:2|max:100',
        'email'   => 'required|email|max:100',
        'subject' => 'required|string|min:3|max:150',
        'message' => 'required|string|min:10|max:2000',
    ];

    protected $messages = [
        'name.required'    => 'Please tell us your name.',
        'email.required'   => 'Your email is required.',
        'email.email'      => 'Please enter a valid email address.',
        'subject.required' => 'Choose or write a subject.',
        'message.required' => 'Don’t forget to write your message!',
        'message.min'      => 'Your message is too short. Tell us more!',
    ];

    public function sendMessage()
    {
        $this->validate();

        // Option 1: Send email (recommended)
        try {
            Mail::to('support@youracademy.com')->send(new ContactFormSubmitted(
                $this->name,
                $this->email,
                $this->subject,
                $this->message
            ));

            session()->flash('success', 'Thank you! We’ve received your message and will reply within 2–4 hours.');

            $this->reset(['name', 'email', 'subject', 'message']);
        } catch (\Exception $e) {
            session()->flash('error', 'Oops! Something went wrong. Please try again later.');
        }

        // Option 2: Or just save to DB (uncomment if you prefer)
        // Contact::create($this->only(['name','email','subject','message']));
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}