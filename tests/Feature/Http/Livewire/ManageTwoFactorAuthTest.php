<?php

use App\Http\Livewire\ManageTwoFactorAuth;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Livewire;
use PragmaRX\Google2FALaravel\Facade as Google2FA;

it('can enable two factor authentication', function () {
    $user = factory(User::class)->create();

    assertEmpty($user->uses_two_factor_auth);
    assertEmpty($user->two_factor_secret);
    assertEmpty($user->two_factor_reset_code);

    Google2FA::shouldReceive('generateSecretKey')
        ->andReturn('secretKey');

    Google2FA::shouldReceive('getQRCodeInline')
        ->with('Laravel', $user->email, 'secretKey', 200)
        ->andReturn('qrCode');

    Google2FA::shouldReceive('verifyKey')
        ->with('secretKey', 123456)
        ->andReturn(true);

    Livewire::actingAs($user)
        ->test(ManageTwoFactorAuth::class)
        ->set('otp', 123456)
        ->call('enableTwoFactorAuth');

    $user = $user->fresh();

    assertTrue((bool) $user->uses_two_factor_auth);
    assertNotEmpty($user->two_factor_secret);
    assertNotEmpty($user->two_factor_reset_code);
});

it('can disable two factor authentication', function () {
    $user = factory(User::class)->create();

    $user->forceFill([
        'two_factor_secret'   => Str::random(40),
        'uses_two_factor_auth'=> true,
    ])->save();

    assertNotEmpty($user->fresh()->two_factor_secret);
    assertTrue((bool) $user->fresh()->uses_two_factor_auth);

    Livewire::actingAs($user)
        ->test(ManageTwoFactorAuth::class)
        ->call('disableTwoFactorAuth');

    assertEmpty($user->fresh()->two_factor_secret);
    assertFalse((bool) $user->fresh()->uses_two_factor_auth);
});
