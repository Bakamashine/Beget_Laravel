<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class null_or_integer implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        for ($i = 0; $i<strlen($value); $i++) {
            if (!is_numeric($value[$i])) {
                $fail("Значение поля :attribute либо не должно быть, либо только цифрами");
                break;
            }
        }
    }
}
