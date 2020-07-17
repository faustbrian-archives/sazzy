<?php

namespace App\Actions;

use App\Exceptions\TeamException;
use App\Mail\InviteExistingUser;
use App\Mail\InviteNewUser;
use App\Models\Team;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Mail;

class InviteTeamMemberAction
{
    private Team $team;

    public function __construct(Team $team)
    {
        $this->team = $team;
    }

    public function execute(string $email, string $role, array $permissions): void
    {
        if ($this->emailAlreadyOnTeam($email)) {
            throw TeamException::emailAlreadyOnTeam();
        }

        if ($this->emailAlreadyInvited($email)) {
            throw TeamException::emailAlreadyInvited();
        }

        $invitedUser = $this->findInvitedUser($email);

        $invitation = $this->team->invitations()->create([
            'user_id'     => $invitedUser !== null ? $invitedUser->id : null,
            'role'        => $role,
            'permissions' => $permissions,
            'email'       => $email,
        ]);

        $mail = Mail::to($invitation->email);

        if ($invitation->user_id) {
            $mail->send(new InviteExistingUser($invitation));
        } else {
            $mail->send(new InviteNewUser($invitation));
        }
    }

    private function emailAlreadyOnTeam(string $email): bool
    {
        return $this->team->members()->where('email', $email)->exists();
    }

    private function emailAlreadyInvited(string $email): bool
    {
        return $this->team->hasPendingInvitation($email);
    }

    private function findInvitedUser(string $email): ?Authenticatable
    {
        return User::where('email', $email)->first();
    }
}
