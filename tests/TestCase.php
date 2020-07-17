<?php

namespace Tests;

use App\Models\Team;
use App\Models\TeamInvitation;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Ramsey\Uuid\Uuid;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function createInvitation(Team $team, User $user): TeamInvitation
    {
        return $team->invitations()->create([
            'uuid'         => Uuid::uuid4(),
            'user_id'      => $user->id,
            'role'         => 'member',
            'permissions'  => [],
            'email'        => $user->email,
        ]);
    }
}
