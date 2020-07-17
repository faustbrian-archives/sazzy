<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\InteractsWithTeam;
use App\Http\Livewire\Concerns\InteractsWithUser;
use Livewire\Component;

class LeaveTeam extends Component
{
    use InteractsWithTeam;
    use InteractsWithUser;

    public function leaveTeam(): void
    {
        $this->team->removeMember($this->user);

        $this->redirectTo(route('home'));
    }
}
