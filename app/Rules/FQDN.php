<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FQDN implements Rule
{
    protected $domain;
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
        $value = array_unique(explode(PHP_EOL, $value));
        foreach ($value as $item) {
            $is_valid = preg_match('/^(?!:\/\/)(?=.{1,255}$)((.{1,63}\.){1,127}(?![0-9]*$)[a-z0-9-]+\.?)$/i', $item);
            if (!$is_valid) {
                $this->domain = $item;
                return $is_valid;
            }
        }
        return $is_valid;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid FQDN - '.$this->domain;
    }
}
