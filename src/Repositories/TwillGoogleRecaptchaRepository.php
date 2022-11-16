<?php

namespace A17\TwillGoogleRecaptcha\Repositories;

use A17\Twill\Repositories\ModuleRepository;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\TwillGoogleRecaptcha\Models\TwillGoogleRecaptcha;

class TwillGoogleRecaptchaRepository extends ModuleRepository
{
    use HandleRevisions;

    public function __construct(TwillGoogleRecaptcha $model)
    {
        $this->model = $model;
    }

    public function theOnlyOne(): TwillGoogleRecaptcha
    {
        $record = TwillGoogleRecaptcha::query()
            ->published()
            ->orderBy('id')
            ->first();

        return $record ?? $this->generate();
    }

    private function generate(): TwillGoogleRecaptcha
    {
        return app(self::class)->create([
            'site_key' => null,

            'private_key' => null,

            'published' => true,
        ]);
    }
}
