<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\InteractsWithTeam;
use App\Http\Livewire\Concerns\InteractsWithUser;
use Livewire\Component;

class PendingInvitations extends Component
{
    use InteractsWithTeam;
    use InteractsWithUser;

    public function acceptInvitation(string $invitationId): void
    {
        $invitation = $this->user->invitations()->findOrFail($invitationId);

        abort_unless($this->user->id === $invitation->user_id, 404);

        $invitation->team->addMember($this->user, $invitation->role, $invitation->permissions);

        $invitation->delete();
    }

    public function rejectInvitation(string $invitationId): void
    {
        $invitation = $this->user->invitations()->findOrFail($invitationId);

        abort_unless($this->user->id === $invitation->user_id, 404);

        $invitation->delete();
    }
}
