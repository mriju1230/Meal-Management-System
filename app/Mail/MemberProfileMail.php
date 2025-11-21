<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MemberProfileMail extends Mailable
{
    use Queueable, SerializesModels;

    public $member;
    public $plainPassword;

    /**
     * Create a new message instance.
     */
    public function __construct($member, $plainPassword)
    {
        $this->member = $member;
        $this->plainPassword = $plainPassword;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Member Profile Details',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'backend.mail.Member', // your Blade view
            with: [
                'member' => $this->member,
                'plain_password' => $this->plainPassword,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
