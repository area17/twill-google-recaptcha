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
        // You can use the validator as a rule in your request, it will terminate right away if it fails
        $request->validate([
            'g-recaptcha-response' => ['required', 'string', new GoogleRecaptchaValidator()],
        ]);

        // Or you can use the google_recaptcha() verification
        $response = google_recaptcha()->verify($request->get('g-recaptcha-response'));

        if (empty($response)) {
            return [
                'success' => false,
                'message' => 'Google recaptcha service error',
            ];
        }

        // All good
        return $response->json();
    }
}
