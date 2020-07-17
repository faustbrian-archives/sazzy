<?php

use App\Http\Livewire\CreateTeam;
use App\Models\User;
use Livewire\Livewire;

it('can create the team', function () {
    Livewire::actingAs(factory(User::class)->create())
        ->test(CreateTeam::class)
        ->set('name', '...')
        ->call('save')
        ->assertHasNoErrors();
});

it('cant create the team if the name is empty', function () {
    Livewire::actingAs(factory(User::class)->create())
        ->test(CreateTeam::class)
        ->call('save')
        ->assertHasErrors(['name' => 'required']);
});

it('cant create the team if the name is longer than 255 characters', function () {
    Livewire::actingAs(factory(User::class)->create())
        ->test(CreateTeam::class)
        ->set('name', str_repeat('x', 256))
        ->call('save')
        ->assertHasErrors(['name' => 'max']);
});
