<?php

namespace App\Models\Concerns;

use App\Events\TeamMemberCreated;
use App\Events\TeamMemberDeleted;
use App\Events\TeamOwnerCreated;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasTeamMembers
{
    public function members(): BelongsToMany
    {
        return $this
            ->belongsToMany(User::class, 'team_user', 'team_id', 'user_id')
            ->using(TeamMember::class)
            ->withPivot(['role', 'permissions']);
    }

    public function addMember(User $user, string $role = 'member', array $permissions = []): void
    {
        $this->members()->detach($user);

        $this->members()->attach($user, ['role' => $role, 'permissions' => $permissions]);

        unset($this->members);

        TeamMemberCreated::dispatch($this, $user);

        if ($role === 'owner') {
            TeamOwnerCreated::dispatch($this, $user);
        }
    }

    public function removeMember(User $user): void
    {
        $this->members()->detach($user);

        TeamMemberDeleted::dispatch($this, $user);
    }
}
