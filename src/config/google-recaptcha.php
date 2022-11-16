<?php

return [
    'enabled' => env('GOOGLE_RECAPTCHA_ENABLED', false),

    'validation' => [
        'lang_key' => 'validation.google_recaptcha',
        'failed' => 'Invisible captcha failed.',
    ],

    'keys' => [
        'site' => env('GOOGLE_RECAPTCHA_SITE_KEY'),
        'private' => env('GOOGLE_RECAPTCHA_PRIVATE_KEY'),
    ],
];
