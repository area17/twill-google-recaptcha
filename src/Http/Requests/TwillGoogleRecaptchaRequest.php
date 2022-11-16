<?php

namespace A17\TwillGoogleRecaptcha\Http\Requests;

use A17\Twill\Http\Requests\Admin\Request;

class TwillGoogleRecaptchaRequest extends Request
{
    public function rulesForCreate(): array
    {
        return [];
    }

    public function rulesForUpdate(): array
    {
        return [];
    }
}
