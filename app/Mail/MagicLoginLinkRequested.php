<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class MagicLoginLinkRequested extends Mailable
{
    use Queueable, SerializesModels;

    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $email)
    {
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.magic-login-link-requested', [
            'url' => URL::temporarySignedRoute(
                'login.magic.consume',
                now()->addMinutes(10),
                ['user' => User::where('email', $this->email)->firstOrFail()->id]
            ),
        ]);
    }
}
