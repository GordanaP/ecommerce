<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IsExcludedByAnotherField implements Rule
{
    /**
     * The field.
     *
     * @var string
     */
    public $field;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($field)
    {
        $this->field = $field;
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
        return ! request()->has([$this->field, $attribute]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This field must not be present when ' .$this->field .' is chosen.' ;
    }
}
