<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\InteractsWithTeam;
use App\Http\Livewire\Concerns\InteractsWithUser;
use Livewire\Component;

class UpdateTeamMember extends Component
{
    use InteractsWithTeam;
    use InteractsWithUser;

    public ?int $userId = null;

    public ?string $role = 'member';

    public array $permissions = [];

    protected $listeners = [
        'editTeamMember' => 'editTeamMember',
    ];

    public function editTeamMember(int $userId): void
    {
        $this->userId = $userId;

        $this->fill($this->teamMember);
    }

    public function updateTeamMember(): void
    {
        abort_unless($this->user->ownsTeam($this->team), 403);

        $this->validate([
            'role' => ['required', 'in:owner,member'],
        ]);

        $this->team->members()->updateExistingPivot($this->teamMember->id, [
            'role' => $this->role,
        ]);

        $this->reset();

        $this->emit('refreshTeamMembers');
    }

    public function getTeamMemberProperty()
    {
        return $this->team->members()->where('user_id', $this->userId)->first();
    }
}
