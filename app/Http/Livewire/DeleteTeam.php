<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\InteractsWithTeam;
use Livewire\Component;

class DeleteTeam extends Component
{
    use InteractsWithTeam;

    public function deleteTeam()
    {
        $this->team->delete();
    }
}
