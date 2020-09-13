<?php

use Illuminate\Validation\ValidationException;

function fail_validation(string $field, string $message): void
{
    throw ValidationException::withMessages([$field => $message]);
}
