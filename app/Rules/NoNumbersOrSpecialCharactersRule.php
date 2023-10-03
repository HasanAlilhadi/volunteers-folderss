<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NoNumbersOrSpecialCharactersRule implements Rule
{

    public function passes($attribute, $value)
    {
        return preg_match('/^[a-z_][a-z_0-9]+$/', $value);
    }

    public function message()
    {
        return 'The :attribute must not start with number or contain any special character';
    }

}
