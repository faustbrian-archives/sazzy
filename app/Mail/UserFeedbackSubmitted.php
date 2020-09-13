<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserFeedbackSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $reason;

    public string $feedback;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $feedback)
    {
        $this->feedback = $feedback;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.user-feedback-submitted');
    }
}
