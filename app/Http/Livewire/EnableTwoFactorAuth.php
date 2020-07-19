<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\InteractsWithUser;
use App\Rules\OneTimePassword;
use Illuminate\Support\Str;
use Livewire\Component;
use PragmaRX\Google2FALaravel\Facade as Google2FA;

class EnableTwoFactorAuth extends Component
{
    use InteractsWithUser;

    public ?string $secretKey = null;

    public ?int $oneTimePassword = null;

    public ?string $resetCode = null;

    public ?string $qrcode = null;

    public function mount()
    {
        $this->secretKey = Google2FA::generateSecretKey();
    }

    public function enableTwoFactorAuth(): void
    {
        $this->validate([
            'oneTimePassword' => ['required', new OneTimePassword($this->secretKey)],
        ]);

        $this->user->forceFill([
            'uses_two_factor_auth'  => true,
            'two_factor_secret'     => encrypt($this->secretKey),
            'two_factor_reset_code' => bcrypt($this->resetCode = Str::random(64)),
        ])->save();
    }
}
