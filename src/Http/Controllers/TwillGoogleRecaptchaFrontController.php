<?php

namespace A17\TwillGoogleRecaptcha\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use A17\TwillGoogleRecaptcha\Support\Validator as GoogleRecaptchaValidator;

class TwillGoogleRecaptchaFrontController
{
    public function show(): View|Factory
    {
        google_recaptcha();

        /** @var view-string $view */
        $view = 'google-recaptcha::front.form';

        return view($view);
    }

    public function store(Request $request): array
    {
        $request->validate([
            'g-recaptcha-response' => ['required', 'string', new GoogleRecaptchaValidator()],
        ]);

        $response = google_recaptcha()->verify($request->get('g-recaptcha-response'));

        if (empty($response)) {
            return [
                'success' => false,
                'message' => 'Google recaptcha service error',
            ];
        }

        return $response->json();
    }
}
