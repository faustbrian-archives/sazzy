<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Concerns\InteractsWithTeam;
use App\Mail\InviteExistingUser;
use App\Mail\InviteNewUser;
use App\Models\Team;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class InviteTeamMember extends Component
{
    use InteractsWithTeam;

    public ?string $email = null;

    public ?string $role = 'member';

    public array $permissions = [];

    public function invite(): void
    {
        $this->validate([
            'email' => ['required', 'email', 'max:255'],
            'role'  => ['required', 'string', 'in:owner,member'],
        ]);

        if ($this->emailAlreadyOnTeam($this->team)) {
            fail_validation('email', 'That user is already on the team.');

            return;
        }

        if ($this->emailAlreadyInvited($this->team)) {
            fail_validation('email', 'That user is already invited to the team.');

            return;
        }

        $invitedUser = User::where('email', $this->email)->first();

        $invitation = $this->createInvitation($invitedUser);

        if (is_null($invitation->user_id)) {
            Mail::to($invitation->email)->send(new InviteExistingUser($invitation));
        } else {
            Mail::to($invitation->email)->send(new InviteNewUser($invitation));
        }

        $this->reset();

        $this->emit('refreshTeamMembers');
    }

    protected function emailAlreadyOnTeam(Team $team): bool
    {
        return $team->members()->where('email', $this->email)->exists();
    }

    protected function emailAlreadyInvited(Team $team): bool
    {
        return $team->invitations()->where('email', $this->email)->exists();
    }

    protected function createInvitation(?Authenticatable $invitedUser)
    {
        return $this->team->invitations()->create([
            'user_id'     => $invitedUser !== null ? $invitedUser->id : null,
            'role'        => $this->role,
            'permissions' => $this->permissions,
            'email'       => $this->email,
        ]);
    }
}
