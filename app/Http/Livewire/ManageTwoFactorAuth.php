<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\InteractsWithUser;
use App\Rules\OneTimePassword;
use Illuminate\Support\Str;
use Livewire\Component;
use PragmaRX\Google2FALaravel\Facade as Google2FA;

class ManageTwoFactorAuth extends Component
{
    use InteractsWithUser;

    public ?string $secretKey = null;

    public ?int $otp = null;

    public ?string $resetCode = null;

    public ?string $qrcode = null;

    public function mount()
    {
        $this->secretKey = Google2FA::generateSecretKey();
    }

    public function enableTwoFactorAuth(): void
    {
        $this->validate([
            'otp' => ['required', new OneTimePassword($this->secretKey)],
        ]);

        $this->user->forceFill([
            'uses_two_factor_auth'  => true,
            'two_factor_secret'     => encrypt($this->secretKey),
            'two_factor_reset_code' => bcrypt($this->resetCode = Str::random(64)),
        ])->save();
    }

    public function disableTwoFactorAuth(): void
    {
        $this->user->forceFill([
            'uses_two_factor_auth'  => false,
            'two_factor_secret'     => null,
            'two_factor_reset_code' => null,
        ])->save();
    }
}
