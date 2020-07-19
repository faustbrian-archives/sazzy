<?php

use App\Http\Livewire\EnableTwoFactorAuth;
use App\Models\User;
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
        ->test(EnableTwoFactorAuth::class)
        ->set('oneTimePassword', 123456)
        ->call('enableTwoFactorAuth');

    assertTrue((bool) $user->uses_two_factor_auth);
    assertNotEmpty($user->two_factor_secret);
    assertNotEmpty($user->two_factor_reset_code);
});
