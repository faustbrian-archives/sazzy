<?php

namespace App\Actions;

use App\Exceptions\TeamInvitationException;
use App\Models\TeamInvitation;
use Illuminate\Support\Facades\Auth;

class AcceptTeamInvitationAction
{
    private TeamInvitation $invitation;

    public function __construct(TeamInvitation $invitation)
    {
        $this->invitation = $invitation;
    }

    public function execute(): void
    {
        $expectedUser = Auth::id() === (int) $this->invitation->user_id;

        if (! $expectedUser) {
            throw TeamInvitationException::attemptedClaimByUnauthorizedUser();
        }

        $this->invitation->team->addMember(
            Auth::user(),
            $this->invitation->role,
            $this->invitation->permissions
        );

        $this->invitation->delete();
    }
}
