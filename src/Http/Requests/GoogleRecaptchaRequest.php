<?php

namespace App\Twill\Capsules\GoogleRecaptchas\Http\Requests;

use A17\Twill\Http\Requests\Admin\Request;

class GoogleRecaptchaRequest extends Request
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
