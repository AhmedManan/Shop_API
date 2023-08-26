<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Password implements Rule
{
    public function passes($attribute, $value)
    {
        // Implement your password validation logic here
        // For example, check if the password meets certain criteria
        // Return true if the password is valid, false otherwise

        // Example: Check if the password is at least 8 characters long
        return strlen($value) >= 8;
    }

    public function message()
    {
        return 'The password is invalid.';
    }
}
