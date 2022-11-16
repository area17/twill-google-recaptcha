<?php

use A17\TwillGoogleRecaptcha\Support\Facades\Route;
use A17\TwillGoogleRecaptcha\Http\Controllers\TwillGoogleRecaptchaController;

Route::name('twillGoogleRecaptcha.redirectToEdit')->get('/twillGoogleRecaptchas/redirectToEdit', [
    TwillGoogleRecaptchaController::class,
    'redirectToEdit',
]);

// @phpstan-ignore-next-line
Route::module('twillGoogleRecaptcha');
