<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\InteractsWithUser;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UpdateUserMail extends Component
{
    use InteractsWithUser;

    public ?string $email = null;

    public function mount(): void
    {
        $this->email = $this->user->email;
    }

    public function save(): void
    {
        $this->validate([
            'email' => ['required', 'max:255', 'email', Rule::unique('users')->ignore($this->user->id)],
        ]);

        $this->user->forceFill(['email' => $this->email])->save();
    }
}
