<?php

namespace App\Events;

use App\Models\Team;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Events\Dispatchable;

class TeamOwnerCreated
{
    use Dispatchable;

    public Team $team;

    public Authenticatable $user;

    public function __construct(Team $team, Authenticatable $user)
    {
        $this->team = $team;
        $this->user = $user;
    }
}
