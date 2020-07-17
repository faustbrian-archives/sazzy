<?php

namespace App\Models\Concerns;

use App\Events\TeamMemberLeft;
use App\Exceptions\TeamException;
use App\Models\Team;
use App\Models\TeamInvitation;
use App\Models\TeamMember;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasTeams
{
    public function invitations(): HasMany
    {
        return $this->hasMany(TeamInvitation::class);
    }

    public function hasTeams(): bool
    {
        return $this->teams->isNotEmpty();
    }

    public function teams(): BelongsToMany
    {
        return $this
            ->belongsToMany(Team::class, 'team_user', 'user_id', 'team_id')
            ->using(TeamMember::class)
            ->withPivot(['role', 'permissions'])
            ->orderBy('name', 'asc');
    }

    public function onTeam(Team $team): bool
    {
        return $this->teams->contains($team);
    }

    public function ownsTeam(Team $team): bool
    {
        return $this->id && $team->user_id && $this->id === $team->user_id;
    }

    public function ownedTeams(): HasMany
    {
        return $this->hasMany('teams', 'user_id');
    }

    public function roleOn(Team $team): ?string
    {
        if ($team = $this->teams->find($team->id)) {
            return $team->pivot->role;
        }

        return null;
    }

    public function roleOnCurrentTeam(): string
    {
        return $this->roleOn($this->currentTeam);
    }

    public function getCurrentTeamAttribute(): ?Team
    {
        return $this->currentTeam();
    }

    public function currentTeam(): ?Team
    {
        if (! $this->hasTeams()) {
            return null;
        }

        if (! is_null($this->current_team_id)) {
            $currentTeam = $this->teams->find($this->current_team_id);

            return $currentTeam ?: $this->refreshCurrentTeam();
        }

        $this->switchToTeam($this->teams()->first());

        return $this->currentTeam();
    }

    public function ownsCurrentTeam(): bool
    {
        $currentTeam = $this->currentTeam();

        if (! $currentTeam) {
            return false;
        }

        $ownerId = (int) $currentTeam->user_id;

        return $currentTeam && $ownerId === $this->id;
    }

    public function switchToTeam(Team $team): void
    {
        if (! $this->onTeam($team)) {
            throw TeamException::doesNotBelongToTeam();
        }

        $this->current_team_id = $team->id;

        $this->save();
    }

    public function refreshCurrentTeam(): ?Team
    {
        $this->current_team_id = null;

        $this->save();

        return $this->currentTeam();
    }

    public function leaveTeam(Team $team): void
    {
        if (! $this->onTeam($team)) {
            throw TeamException::doesNotBelongToTeam();
        }

        $team->removeMember($this);

        TeamMemberLeft::dispatch($team, $this);
    }
}
