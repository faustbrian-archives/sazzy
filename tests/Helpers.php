<?php

namespace Tests;

use Illuminate\Contracts\Auth\Authenticatable;

function actingAs(Authenticatable $user, string $driver = null)
{
    return test()->actingAs($user, $driver);
}
