<?php

namespace A17\TwillGoogleRecaptcha\Support;

use Illuminate\Contracts\Validation\Rule;

class Validator implements Rule
{
    protected $messages = [];

    public function passes($attribute, $value)
    {
        if (google_recaptcha()->fails()) {
            return $fail(google_recaptcha()->failedMessage());
        }

        return $this->messages === [];
    }

    public function message()
    {
        return $this->messages;
    }
}
