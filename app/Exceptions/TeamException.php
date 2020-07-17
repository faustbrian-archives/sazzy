<?php

namespace App\Exceptions;

use Exception;

class TeamException extends Exception
{
    public static function doesNotBelongToTeam(): self
    {
        return new static('The user does not belong to the given team.');
    }

    public static function doesNotHaveOwnership(): self
    {
        return new static('The user does not have ownership on the given team.');
    }

    public static function emailAlreadyOnTeam(): self
    {
        return new static('The user is already on the team.');
    }

    public static function emailAlreadyInvited(): self
    {
        return new static('The user is already invited to the team.');
    }

    public static function canNotRemoveOwner(): self
    {
        return new static('The user holds ownership of the given team.');
    }
}
