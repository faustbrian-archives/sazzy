<?php

namespace App\Events;

use App\Models\Team;
use Illuminate\Foundation\Events\Dispatchable;

class TeamDeleted
{
    use Dispatchable;

    public Team $team;

    public function __construct(Team $team)
    {
        $this->team = $team;
    }
}
