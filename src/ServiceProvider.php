<?php

namespace A17\TwillGoogleRecaptcha;

use Illuminate\Support\Str;
use A17\Twill\Facades\TwillCapsules;
use A17\Twill\TwillPackageServiceProvider;

class ServiceProvider extends TwillPackageServiceProvider
{
    /** @var bool $autoRegisterCapsules */
    protected $autoRegisterCapsules = false;

    public function boot(): void
    {
        $this->registerThisCapsule();

        $this->registerViews();

        $this->registerConfig();

        parent::boot();
    }

    protected function registerThisCapsule(): void
    {
        $namespace = $this->getCapsuleNamespace();

        TwillCapsules::registerPackageCapsule(
            Str::afterLast($namespace, '\\'),
            $namespace,
            $this->getPackageDirectory() . '/src',
        );
    }

    public function registerViews()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'twill-google-recaptcha');
    }

    public function registerConfig()
    {
        $this->publishes([
            __DIR__.'/config/twill-google-recaptcha.php' => config_path('twill-google-recaptcha.php'),
        ]);
    }
}
