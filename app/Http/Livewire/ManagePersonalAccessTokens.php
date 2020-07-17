<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\InteractsWithUser;
use Illuminate\Support\Collection;
use Livewire\Component;

class ManagePersonalAccessTokens extends Component
{
    use InteractsWithUser;

    protected $listeners = [
        'refreshPersonalAccessTokens' => '$refresh',
    ];

    public function deleteToken(string $id): void
    {
        $this->user->tokens()->findOrFail($id)->delete();
    }

    public function getTokensProperty(): Collection
    {
        return $this->user->tokens;
    }
}
