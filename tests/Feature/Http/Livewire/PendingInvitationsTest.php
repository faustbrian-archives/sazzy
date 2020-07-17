<?php

use App\Http\Livewire\PendingInvitations;
use App\Models\Team;
use App\Models\User;
use Livewire\Livewire;

it('can accept an invitation', function () {
    $user = factory(User::class)->create();
    $team = factory(Team::class)->create(['user_id' => $user->id]);
    $team->addMember($user, 'owner');

    $invitation = $this->createInvitation($team, $user);

    $this->assertDatabaseHas('team_invitations', [
        'id'      => $invitation->id,
        'user_id' => $team->id,
    ]);

    $this->assertDatabaseMissing('team_user', [
        'team_id' => $user->id,
        'user_id' => $team->id,
        'role'    => 'member',
    ]);

    Livewire::actingAs($user)
        ->test(PendingInvitations::class)
        ->call('acceptInvitation', $invitation->id);

    $this->assertDatabaseHas('team_user', [
        'team_id' => $user->id,
        'user_id' => $team->id,
        'role'    => 'member',
    ]);
});

it('can reject an invitation', function () {
    $user = factory(User::class)->create();
    $team = factory(Team::class)->create(['user_id' => $user->id]);
    $team->addMember($user, 'owner');

    $invitation = $this->createInvitation($team, $user);

    $this->assertDatabaseHas('team_invitations', [
        'id'      => $invitation->id,
        'user_id' => $team->id,
    ]);

    $this->assertDatabaseMissing('team_user', [
        'team_id' => $user->id,
        'user_id' => $team->id,
        'role'    => 'member',
    ]);

    Livewire::actingAs($user)
        ->test(PendingInvitations::class)
        ->call('rejectInvitation', $invitation->id);

    $this->assertDatabaseMissing('team_user', [
        'team_id' => $user->id,
        'user_id' => $team->id,
        'role'    => 'member',
    ]);
});
