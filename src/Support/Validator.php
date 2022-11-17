<?php

namespace A17\TwillGoogleRecaptcha\Support;

use Illuminate\Contracts\Validation\Rule;

class Validator implements Rule
{
    public function passes($attribute, $value): bool
    {
        return google_recaptcha()->fails();
    }

    public function message(): string
    {
        return google_recaptcha()->failedMessage();
    }
}
