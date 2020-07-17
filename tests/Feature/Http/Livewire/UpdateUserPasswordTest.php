<?php

use App\Http\Livewire\UpdateUserPassword;
use App\Models\User;
use App\Rules\CurrentPassword;
use Illuminate\Support\Str;
use Livewire\Livewire;

it('can update the password if the current password is valid', function () {
    Livewire::actingAs(factory(User::class)->create())
        ->test(UpdateUserPassword::class)
        ->set('current_password', 'password')
        ->set('password', 'new_password')
        ->set('password_confirmation', 'new_password')
        ->call('save')
        ->assertHasNoErrors();
});

it('cant update the password if the current password is invalid', function () {
    Livewire::actingAs(factory(User::class)->create())
        ->test(UpdateUserPassword::class)
        ->set('current_password', 'invalid-current-password')
        ->set('password', 'new_password')
        ->set('password_confirmation', 'new_password')
        ->call('save')
        ->assertHasErrors(['current_password' => Str::snake(CurrentPassword::class)]);
});

it('cant update the password if the new password confirmation is missing', function () {
    Livewire::actingAs(factory(User::class)->create())
        ->test(UpdateUserPassword::class)
        ->set('current_password', 'password')
        ->set('password', 'new_password')
        ->call('save')
        ->assertHasErrors(['password' => 'confirmed']);
});

it('cant update the password if the new password confirmation does not match', function () {
    Livewire::actingAs(factory(User::class)->create())
        ->test(UpdateUserPassword::class)
        ->set('current_password', 'password')
        ->set('password', 'new_password')
        ->set('password_confirmation', 'new_password_mismatch')
        ->call('save')
        ->assertHasErrors(['password' => 'confirmed']);
});

it('cant update the password if the new password is shorther than 8 characters', function () {
    Livewire::actingAs(factory(User::class)->create())
        ->test(UpdateUserPassword::class)
        ->set('current_password', 'password')
        ->set('password', 'short')
        ->set('password_confirmation', 'short')
        ->call('save')
        ->assertHasErrors(['password' => 'min']);
});
