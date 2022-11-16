<?php

namespace App\Twill\Capsules\GoogleRecaptchas\Repositories;

use A17\Twill\Repositories\ModuleRepository;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use App\Twill\Capsules\GoogleRecaptchas\Models\GoogleRecaptcha;

class GoogleRecaptchaRepository extends ModuleRepository
{
    use HandleRevisions;

    public function __construct(GoogleRecaptcha $model)
    {
        $this->model = $model;
    }

    public function getPage(): GoogleRecaptcha
    {
        return $this->theOnlyOne();
    }

    public function theOnlyOne(): GoogleRecaptcha
    {
        $record = GoogleRecaptcha::query()
            ->published()
            ->orderBy('id')
            ->first();

        return $record ?? $this->generate();
    }

    private function generate(): GoogleRecaptcha
    {
        return app(self::class)->create([
            'site_key' => null,

            'private_key' => null,

            'published' => true,
        ]);
    }
}
