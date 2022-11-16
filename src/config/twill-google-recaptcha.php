<?php

return [
    'enabled' => env('TWILL_GOOGLE_RECAPTCHA_ENABLED', false),

    'validation' => [
        'lang_key' => 'validation.google_recaptcha',
        'failed' => 'Invisible captcha failed.',
    ],

    'keys' => [
        'site' => env('TWILL_GOOGLE_RECAPTCHA_SITE_KEY'),
        'private' => env('TWILL_GOOGLE_RECAPTCHA_PRIVATE_KEY'),
    ],
];
