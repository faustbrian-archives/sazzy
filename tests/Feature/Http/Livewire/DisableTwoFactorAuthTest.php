<?php

use App\Http\Livewire\DisableTwoFactorAuth;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Livewire;
use PragmaRX\Google2FALaravel\Facade as Google2FA;

it('can disable two factor authentication', function () {
    $user = factory(User::class)->create();

    $user->forceFill([
        'two_factor_secret'   => Str::random(40),
        'uses_two_factor_auth'=> true,
    ])->save();

    Google2FA::shouldReceive('verifyKey')
        ->with($user->two_factor_secret, 123456)
        ->andReturn(true);

    assertNotEmpty($user->two_factor_secret);
    assertTrue((bool) $user->uses_two_factor_auth);

    Livewire::actingAs($user)
        ->test(DisableTwoFactorAuth::class)
        ->set('oneTimePassword', 123456)
        ->call('disableTwoFactorAuth')
        ->assertHasNoErrors();

    assertEmpty($user->two_factor_secret);
    assertFalse((bool) $user->uses_two_factor_auth);
});
