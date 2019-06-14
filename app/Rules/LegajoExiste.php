<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Sue001;

class LegajoExiste implements Rule
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
        $legajo = Sue001::where('codigo', '=', $value)->first();
        if ($legajo === null) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El legajo buscado no existe.';
    }
}
