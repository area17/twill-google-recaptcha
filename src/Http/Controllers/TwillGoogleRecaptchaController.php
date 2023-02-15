<?php

namespace A17\TwillGoogleRecaptcha\Http\Controllers;

use A17\Twill\Models\Contracts\TwillModelContract;
use Illuminate\Http\RedirectResponse;
use A17\Twill\Http\Controllers\Admin\ModuleController;
use A17\TwillGoogleRecaptcha\Models\TwillGoogleRecaptcha;
use A17\TwillGoogleRecaptcha\Repositories\TwillGoogleRecaptchaRepository;

class TwillGoogleRecaptchaController extends ModuleController
{
    protected $moduleName = 'twillGoogleRecaptcha';

    protected $titleColumnKey = 'site_key';

    public function setUpController(): void
    {
        $this->disablePermalink();
        $this->disableEdit();
    }

    public function redirectToEdit(TwillGoogleRecaptchaRepository $repository): RedirectResponse
    {
        return redirect()->route('twill.twillGoogleRecaptcha.show', [
            'twillGoogleRecaptcha' => $repository->theOnlyOne()->id,
        ]);
    }

    public function index(?int $parentModuleId = null): RedirectResponse
    {
        return redirect()->route('twill.twillGoogleRecaptcha.redirectToEdit');
    }

    public function edit(TwillModelContract|int $id): mixed
    {
        $repository = new TwillGoogleRecaptchaRepository(new TwillGoogleRecaptcha());

        return parent::edit($repository->theOnlyOne()->id);
    }

    protected function formData($request): array
    {
        return [
            'editableTitle' => false,
            'customTitle' => ' ',
        ];
    }

    protected function getViewPrefix(): string|null
    {
        return 'twill-google-recaptcha::admin';
    }
}
