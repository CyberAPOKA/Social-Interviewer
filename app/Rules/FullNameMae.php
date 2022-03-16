<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FullNameMae implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
       //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return str_word_count($value,0,'ÃÕãõÁÉÍÓÚÂÊÎÔÛÇàèìòùáéóíúçâêôîûäëïöüÄËÏÖÜ') > 1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Insira o nome completo da sua mãe.';
    }
}