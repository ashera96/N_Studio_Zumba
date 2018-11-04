<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use DateTime;

class ageOfReceptionistValidation implements Rule
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
    public function passes($attribute,$value)
    {
        $dob = new DateTime($value);
        $now = new DateTime();
        if($now->diff($dob)->y >= 18 && $now->diff($dob)->y <= 35 ){
            return true;
        } else{
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Age is not suitable';
    }

}
