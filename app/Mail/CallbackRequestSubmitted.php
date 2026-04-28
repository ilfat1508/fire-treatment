<?php

namespace App\Mail;

use App\Models\CallbackRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CallbackRequestSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public CallbackRequest $callbackRequest,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Новая заявка на обратный звонок',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.callback-request-submitted',
        );
    }
}
