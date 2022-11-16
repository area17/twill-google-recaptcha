<?php

namespace A17\TwillGoogleRecaptcha\Support;

use Illuminate\Contracts\Validation\InvokableRule;

class Validator implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail): void
    {
        if (google_recaptcha()->fails()) {
            $fail(google_recaptcha()->failedMessage());
        }
    }
}
