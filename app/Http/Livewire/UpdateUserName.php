<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\InteractsWithUser;
use Livewire\Component;

class UpdateUserName extends Component
{
    use InteractsWithUser;

    public ?string $name = null;

    public function mount(): void
    {
        $this->name = $this->user->name;
    }

    public function save(): void
    {
        $this->validate([
            'name' => ['required', 'max:255'],
        ]);

        $this->user->forceFill(['name' => $this->name])->save();
    }
}
