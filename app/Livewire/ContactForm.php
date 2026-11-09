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

                try {
                    Mail::to('support@esencialacademy.com')->send(new ContactMessage(
                        $this->name,
                        $this->email,
                        $this->subject,
                        $markdownMessage
                    ));

                    // Success
                    session()->flash('success', 'Your message has been sent successfully!');
                    $this->reset(['name', 'email', 'subject', 'message']);

                } catch (\Symfony\Component\Mailer\Exception\TransportException $e) {
                    // SMTP / authentication problems (the one you are seeing)
                    session()->flash('error', 'Sorry, we could not send your message right now. Please try again later or contact us directly.');
                    // Optional: log the real error for yourself
                    \Log::error('Mail transport error: ' . $e->getMessage());

                } catch (\Exception $e) {
                    // Any other unexpected error
                    session()->flash('error', 'An unexpected error occurred. Please try again later.');
                    // \Log::error('Contact form error: ' . $e->getMessage());
                }
            }
    public function render()
    {
        // dd(dd);
        return view('livewire.contact-form');
    }
}