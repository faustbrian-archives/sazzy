<?php

namespace App\Actions;

use App\Exceptions\TeamException;
use App\Models\Team;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class RemoveTeamMemberAction
{
    private Team $team;

    public function __construct(Team $team)
    {
        $this->team = $team;
    }

    public function execute(Authenticatable $member): void
    {
        if ($this->isOwner($member)) {
            throw TeamException::canNotRemoveOwner();
        }

        // if ($this->isCurrentUser($member)) {
        //     throw TeamException::canNotRemoveCurrentUser();
        // }

        $this->team->removeMember($member);
    }

    private function isOwner(Authenticatable $member): bool
    {
        $currentUser = Auth::user();

        return $currentUser->ownsTeam($this->team) && $currentUser->id === $member->id;
    }

    // private function isCurrentUser(Authenticatable $member): bool
    // {
    //     return Auth::id() !== $member->id;
    // }
}
