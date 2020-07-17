<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\InteractsWithUser;
use Livewire\Component;

class CreatePersonalAccessToken extends Component
{
    use InteractsWithUser;

    public ?string $name = null;

    public ?string $accessToken = null;

    public function save(): void
    {
        $this->validate([
            'name' => ['required', 'max:255'],
        ]);

        $this->accessToken = $this->user->createToken($this->name)->plainTextToken;

        $this->emit('refreshPersonalAccessTokens');
    }
}
