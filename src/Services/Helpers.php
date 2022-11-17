<?php

namespace A17\TwillGoogleRecaptcha\Services;

use A17\TwillGoogleRecaptcha\Support\GoogleRecaptcha;

class Helpers
{
    public static function load(): void
    {
        require __DIR__ . '/../Support/helpers.php';
    }

    public static function googleRecaptchaInstance(): GoogleRecaptcha
    {
        if (!app()->bound('google-recaptcha')) {
            app()->singleton('google-recaptcha', fn() => new GoogleRecaptcha());
        }

        return app('google-recaptcha');
    }

    public static function viewShare(): void
    {
        $googleRecaptcha = Helpers::googleRecaptchaInstance();

        view()->share('twillGoogleRecaptcha', $googleRecaptcha->config() + ['asset' => $googleRecaptcha->asset()]);
    }
}
