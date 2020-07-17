<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\InteractsWithTeam;
use App\Http\Livewire\Concerns\InteractsWithUser;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UpdateTeamName extends Component
{
    use InteractsWithTeam;
    use InteractsWithUser;

    public ?string $name = null;

    public function mount(): void
    {
        $this->name = $this->team->name;
    }

    public function save(): void
    {
        abort_unless($this->user->ownsTeam($this->team), 403);

        $this->validate([
            'name' => ['required', 'max:255', Rule::unique('teams')->ignore($this->team->id)],
        ]);

        $this->team->forceFill(['name' => $this->name])->save();
    }
}
