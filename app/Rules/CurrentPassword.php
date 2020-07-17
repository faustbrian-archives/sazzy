<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class CurrentPassword implements Rule
{
    private string $password;

    public function __construct(string $password)
    {
        $this->password = $password;
    }

    public function passes($attribute, $value)
    {
        return Hash::check($value, $this->password);
    }

    public function message()
    {
        return 'The given password does not match our records.';
    }
}
