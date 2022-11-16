<?php

use App\Support\Facades\Route;
use App\Twill\Capsules\GoogleRecaptchas\Http\Controllers\GoogleRecaptchaController;

Route::prefix('config')->group(function () {
    Route::name('config.googleRecaptchas.redirectToEdit')->get('/googleRecaptchas/redirectToEdit', [
        GoogleRecaptchaController::class,
        'redirectToEdit',
    ]);

    // @phpstan-ignore-next-line
    Route::module('googleRecaptchas');
});
