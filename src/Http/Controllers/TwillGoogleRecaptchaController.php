<?php

namespace A17\TwillGoogleRecaptcha\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use A17\Twill\Http\Controllers\Admin\ModuleController;
use A17\TwillGoogleRecaptcha\Models\TwillGoogleRecaptcha;
use A17\TwillGoogleRecaptcha\Repositories\TwillGoogleRecaptchaRepository;

class TwillGoogleRecaptchaController extends ModuleController
{
    protected $moduleName = 'twillGoogleRecaptcha';

    protected $titleColumnKey = 'site_key';

    protected $indexOptions = ['edit' => false];

    public function redirectToEdit(TwillGoogleRecaptchaRepository $repository): RedirectResponse
    {
        return redirect()->route('admin.twillGoogleRecaptcha.show', ['twillGoogleRecaptcha' => $repository->theOnlyOne()->id]);
    }

    /**
     * @param int|null $parentModuleId
     * @return array|\Illuminate\View\View
     */
    public function index($parentModuleId = null)
    {
        return redirect()->route('admin.twillGoogleRecaptcha.redirectToEdit');
    }

    /**
     * @param int $id
     * @param int|null $submoduleId
     */
    public function edit($id, $submoduleId = null): JsonResponse|RedirectResponse|View
    {
        $repository = new TwillGoogleRecaptchaRepository(new TwillGoogleRecaptcha());

        return parent::edit($repository->theOnlyOne()->id, $submoduleId);
    }

    protected function formData($request): array
    {
        return [
            'editableTitle' => false,
            'customTitle' => ' ',
        ];
    }

    protected function getViewPrefix(): ?string
    {
        return 'twill-google-recaptcha::admin';
    }
}
