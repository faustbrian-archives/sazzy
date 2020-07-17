<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\InteractsWithTeam;
use App\Http\Livewire\Concerns\InteractsWithUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ManageTeamMembers extends Component
{
    use InteractsWithTeam;
    use InteractsWithUser;

    protected $listeners = ['refreshTeamMembers' => '$refresh'];

    public function deleteTeamMember(string $id): void
    {
        $member = $this->team->members()->findOrFail($id);

        abort_unless($this->canBeRemoved($member), 403);

        $this->team->removeMember($member);
    }

    public function cancelInvitation(string $id): void
    {
        $this->team->invitations()->destroy($id);
    }

    private function canBeRemoved(Model $member): bool
    {
        $currentUser = Auth::user();

        if ($currentUser->ownsTeam($this->team) === null) {
            return false;
        }

        return $currentUser->id !== $member->id;
    }
}
