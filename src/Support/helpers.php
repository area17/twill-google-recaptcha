<?php

use App\Twill\Capsules\GoogleRecaptchas\Support\GoogleRecaptcha;

if (!function_exists('google_recaptcha')) {
    function google_recaptcha(): GoogleRecaptcha
    {
        if (!app()->bound('google-recaptcha')) {
            app()->singleton('google-recaptcha', fn() => new GoogleRecaptcha());
        }

        return app('google-recaptcha');
    }
}
