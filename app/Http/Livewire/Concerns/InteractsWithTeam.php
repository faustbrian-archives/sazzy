<?php

namespace App\Http\Livewire\Concerns;

use App\Models\Team;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

trait InteractsWithTeam
{
    public function getTeamProperty(): Team
    {
        return Auth::user()->currentTeam();
    }

    public function getMembersProperty(): Collection
    {
        return $this->team->members;
    }

    public function getInvitationsProperty(): Collection
    {
        return $this->team->invitations;
    }
}
