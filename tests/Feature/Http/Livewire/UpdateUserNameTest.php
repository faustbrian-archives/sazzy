<?php

use App\Http\Livewire\UpdateUserName;
use App\Models\User;
use Livewire\Livewire;

it('can update the name and email', function () {
    Livewire::actingAs($user = factory(User::class)->create())
        ->test(UpdateUserName::class)
        ->set('name', $user->name)
        ->call('save')
        ->assertHasNoErrors();
});

it('can update the name', function () {
    Livewire::actingAs($user = factory(User::class)->create())
        ->test(UpdateUserName::class)
        ->set('name', $user->name)
        ->call('save')
        ->assertHasNoErrors();
});

it('cant update the name if it is empty', function () {
    Livewire::actingAs(factory(User::class)->create())
        ->test(UpdateUserName::class)
        ->set('name', null)
        ->call('save')
        ->assertHasErrors(['name' => 'required']);
});

it('cant update the name if it is longer than 255 characters', function () {
    Livewire::actingAs(factory(User::class)->create())
        ->test(UpdateUserName::class)
        ->set('name', str_repeat('x', 256))
        ->call('save')
        ->assertHasNoErrors(['name' => 'required']);
});
