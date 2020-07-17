<?php

namespace App\Http\Livewire;

use App\Mail\UserFeedbackSubmitted;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class UserFeedback extends Component
{
    public $reason;

    public $feedback;

    public function submit()
    {
        Mail::to(config('mail.from.address'))->send(new UserFeedbackSubmitted($this->reason, $this->feedback));
    }
}
