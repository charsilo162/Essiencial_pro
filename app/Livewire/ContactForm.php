<?php
namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ContactMessage; 

class ContactForm extends Component
{
    public $name = '';
    public $email = '';
    public $subject = '';
    public $message = '';

    protected $rules = [
        'name' => 'required|string|min:2|max:255',
        'email' => 'required|email',
        'subject' => 'required|string',
        'message' => 'required|string|min:10',
    ];

    public function updated($propertyName)
    {
        // Real-time validation on update (thanks to wire:model.live)
        $this->validateOnly($propertyName);
    }

    public function sendMessage()
    {
        $this->validate();

        // Convert message to HTML using Markdown
        $markdownMessage = Str::markdown($this->message);

        // Send email (assuming you have a Mailable set up)
        Mail::to('support@youracademy.com')->send(new ContactMessage(
            $this->name,
            $this->email,
            $this->subject,
            $markdownMessage
        ));

        // Flash success message
        session()->flash('success', 'Your message has been sent successfully!');

        // Reset form fields
        $this->reset(['name', 'email', 'subject', 'message']);
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}