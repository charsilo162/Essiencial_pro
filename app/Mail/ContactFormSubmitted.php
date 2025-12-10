<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $senderName;
    public $senderEmail;
    public $subjectLine;
    public $userMessage;

    public function __construct($name, $email, $subject, $message)
    {
        $this->senderName    = $name;
        $this->senderEmail   = $email;
        $this->subjectLine   = $subject;
        $this->userMessage   = $message;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: $this->senderEmail,
            subject: '[Contact Form] ' . $this->subjectLine,
            replyTo: [$this->senderEmail]
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-form',
            with: [
                'name'    => $this->senderName,
                'email'   => $this->senderEmail,
                'subject' => $this->subjectLine,
                'message' => $this->userMessage,
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}