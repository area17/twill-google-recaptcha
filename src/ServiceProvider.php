<?php

namespace A17\TwillGoogleRecaptcha;

use Illuminate\Support\Str;
use A17\Twill\Facades\TwillCapsules;
use A17\Twill\TwillPackageServiceProvider;
use A17\TwillGoogleRecaptcha\Services\Helpers;

class ServiceProvider extends TwillPackageServiceProvider
{
    /** @var bool $autoRegisterCapsules */
    protected $autoRegisterCapsules = false;

    public function boot(): void
    {
        $this->loadHelpers();

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

    public function registerViews(): void
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'twill-google-recaptcha');
    }

    public function registerConfig(): void
    {
        $package = 'twill-google-recaptcha';

        $path = __DIR__ . "/config/{$package}.php";

        $this->mergeConfigFrom($path, $package);

        $this->publishes([
            $path => config_path("{$package}.php"),
        ]);
    }

    public function loadHelpers(): void
    {
        Helpers::load();
    }
}
