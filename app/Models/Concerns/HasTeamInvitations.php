<?php

namespace App\Models\Concerns;

use App\Models\TeamInvitation;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasTeamInvitations
{
    public function invitations(): HasMany
    {
        return $this->hasMany(TeamInvitation::class);
    }

    public function hasPendingInvitation(string $email): bool
    {
        return $this->invitations()->where('email', $email)->exists();
    }
}
