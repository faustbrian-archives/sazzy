<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\InteractsWithUser;
use App\Rules\CurrentPassword;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UpdateUserPassword extends Component
{
    use InteractsWithUser;

    public ?string $current_password = null;

    public ?string $password = null;

    public ?string $password_confirmation = null;

    public function save(): void
    {
        $this->validate([
            'current_password' => ['required', new CurrentPassword($this->user->password)],
            'password'         => ['required', 'confirmed', 'min:8'],
        ]);

        $this->user->forceFill([
            'password' => Hash::make($this->password),
        ])->save();
    }
}
