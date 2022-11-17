<?php

use A17\TwillGoogleRecaptcha\Services\Helpers;
use A17\TwillGoogleRecaptcha\Support\GoogleRecaptcha;

if (!function_exists('google_recaptcha')) {
    function google_recaptcha(): GoogleRecaptcha
    {
        return Helpers::googleRecaptchaInstance();
    }
}
