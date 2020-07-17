<?php

use App\Http\Livewire\UpdateUserMail;
use App\Models\User;
use Livewire\Livewire;

it('can update the name and email', function () {
    Livewire::actingAs($user = factory(User::class)->create())
        ->test(UpdateUserMail::class)
        ->set('email', $user->email)
        ->call('save')
        ->assertHasNoErrors();
});

it('can update the email', function () {
    Livewire::actingAs($user = factory(User::class)->create())
        ->test(UpdateUserMail::class)
        ->set('email', $user->email)
        ->call('save')
        ->assertHasNoErrors();
});

it('cant update the email if it is invalid', function () {
    Livewire::actingAs(factory(User::class)->create())
        ->test(UpdateUserMail::class)
        ->set('email', 'invalid-email')
        ->call('save')
        ->assertHasNoErrors(['email' => 'required']);
});

it('cant update the email if it is longer than 255 characters', function () {
    Livewire::actingAs(factory(User::class)->create())
        ->test(UpdateUserMail::class)
        ->set('email', 'hello@'.str_repeat('x', 256).'.de')
        ->call('save')
        ->assertHasNoErrors(['email' => 'required']);
});

it('cant update the email if it is already used by another user', function () {
    $user  = factory(User::class)->create();
    $user2 = factory(User::class)->create();

    Livewire::actingAs($user)
        ->test(UpdateUserMail::class)
        ->set('email', $user2->email)
        ->call('save')
        ->assertHasNoErrors(['email' => 'required']);
});
