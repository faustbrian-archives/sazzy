<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\InteractsWithUser;
use Livewire\Component;

class SwitchTeam extends Component
{
    use InteractsWithUser;

    public function switchTeam(string $id): void
    {
        $team = $this->user->teams()->findOrFail($id);

        abort_unless($this->user->onTeam($team), 404);

        $this->user->switchToTeam($team);
    }
}
