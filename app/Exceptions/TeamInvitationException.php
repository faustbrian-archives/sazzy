<?php

namespace App\Exceptions;

use Exception;

class TeamInvitationException extends Exception
{
    public static function expirationExceeded(): self
    {
        return new static('The invitation has exceeded the expiration date.');
    }

    public static function attemptedClaimByUnauthorizedUser(): self
    {
        return new static('The user is not authorized to claim the given invitation.');
    }
}
