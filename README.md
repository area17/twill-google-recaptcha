# Google reCAPTCHA v3 Twill Capsule

## Installing

## Supported Versions
Composer will manage this automatically for you, but these are the supported versions between Twill and this package.

| Twill Version | HTTP Basic Auth Capsule |
|---------------|-------------------------|
| 3.x           | 2.x                     |
| 2.x           | 1.x                     |

### Require the Composer package:

```bash
composer require area17/twill-google-recaptcha
```

### Publish the configuration

```bash
php artisan vendor:publish --provider="A17\TwillGoogleRecaptcha\ServiceProvider"
```

### Load Capsule helpers by adding calling the loader to your AppServiceProvider:

```php
/**
 * Register any application services.
 *
 * @return void
 */
public function register()
{
    \A17\TwillGoogleRecaptcha\Services\Helpers::load();
}
```

#### Create debugging routes to check if it's all good

```php
Route::prefix('/debug')->group(function () {
    Route::get('/google-recaptcha-3', [A17\TwillGoogleRecaptcha\Http\Controllers\TwillGoogleRecaptchaFrontController::class, 'show'])->name(
        'google-recaptcha.show',
    );

    Route::post('/google-recaptcha-3', [A17\TwillGoogleRecaptcha\Http\Controllers\TwillGoogleRecaptchaFrontController::class, 'store'])->name(
        'google-recaptcha.store',
    );
});
```

#### Translate validation messages on validation.php

```php
'google_recaptcha' => 'Failed invisible Google reCAPTCHA, please try again.',
```

#### Sharing it in your views

To have a `$twillGoogleRecaptcha` shared on your views, you can call this helper on your `AppServiceProvider`: 

```php
\A17\TwillGoogleRecaptcha\Services\Helpers::viewShare()
```

One possible example is to use `View::composer()` to load the needed variables into your views: 

``` php
<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use A17\TwillGoogleRecaptcha\Services\Helpers as TwillGoogleRecaptchaHelpers;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        View::composer('*', function () {
            \A17\TwillGoogleRecaptcha\Services\Helpers::viewShare();
        });
    }
}
```

#### Test it out

Head to: http://site.com/debug/google-recaptcha-3

#### Captcha keys works both on .env or in the CMS settings, but .env trumps the CMS settings

```dotenv
TWILL_GOOGLE_RECAPTCHA_SITE_KEY=61df2g3hjkj7hgf6df54g3hj2kl3k4j5h6G
TWILL_GOOGLE_RECAPTCHA_PRIVATE_KEY=6Lg5h43jkl45k6jh7g6h5j4kl3nj5k4l3P
TWILL_GOOGLE_RECAPTCHA_ENABLED=true
```

#### Check the working form example

File: app/Twill/Capsules/GoogleRecaptchas/resources/views/front/form.blade.php

#### Use the validator

```php
use A17\TwillGoogleRecaptcha\Support\Validator as GoogleRecaptchaValidator;

$request->validate([
    'g-recaptcha-response' => ['required', 'string', new GoogleRecaptchaValidator()],
]);
```

## Contribute

Please contribute to this project by submitting pull requests.
