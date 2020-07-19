<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\InteractsWithUser;
use App\Rules\OneTimePassword;
use Livewire\Component;

class DisableTwoFactorAuth extends Component
{
    use InteractsWithUser;

    public ?int $oneTimePassword = null;

    public function disableTwoFactorAuth(): void
    {
        $this->validate([
            'oneTimePassword' => ['required', new OneTimePassword($this->user->two_factor_secret)],
        ]);

        $this->user->forceFill([
            'uses_two_factor_auth'  => false,
            'two_factor_secret'     => null,
            'two_factor_reset_code' => null,
        ])->save();
    }
}
