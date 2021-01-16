<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UpperCase implements Rule
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
        // EHSAN  == EHSAN   ---> true
        return  strtoupper($value)==$value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'مقدرا مورد نظر شما باید با حروف بزرگ نوشته شود.';
    }
}
