<?php

namespace App\Actions;

use App\Models\Team;
use Illuminate\Contracts\Auth\Authenticatable;

class UpdateTeamMemberAction
{
    private Team $team;

    public function __construct(Team $team)
    {
        $this->team = $team;
    }

    public function execute(Authenticatable $member, string $role, array $permissions): void
    {
        $this->team->members()->updateExistingPivot($member, ['role' => $role, 'permissions' => $permissions]);
    }
}
