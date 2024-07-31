<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    private User $user;

    public function __construct(User $user) //Passind data to your Email using constructor
    {
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope    //This is the header of the Email
    {
        return new Envelope(
            subject: 'Thanks for joining '.config('app.name',''),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content  //This is the content of the Email
    {
        return new Content(
            view: 'emails.welcome-email',
            with: [
                'user' => $this->user
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array    // a document or file that is sent with an email message
    {
        return [
            Attachment::fromStorageDisk('public','profile/Rw1uZUQfHKIXaT8qMJT2zJpqW9k686w6M2DaraYa.jpg')
        ];
    }
}
