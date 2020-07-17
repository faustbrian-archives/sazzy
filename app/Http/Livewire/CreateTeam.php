<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\InteractsWithUser;
use App\Models\Team;
use Livewire\Component;

class CreateTeam extends Component
{
    use InteractsWithUser;

    public ?string $name = null;

    public $team;

    public function save(): void
    {
        $this->validate([
            'name' => ['required', 'max:255', 'unique:teams'],
        ]);

        $team = Team::create([
            'user_id' => $this->user->id,
            'name'    => $this->name,
        ]);

        $team->addMember($this->user, 'owner', ['*']);

        $team->createAsStripeCustomer();
    }
}
