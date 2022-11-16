<?php

namespace App\Twill\Capsules\GoogleRecaptchas\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Twill\Capsules\Base\ModuleController;
use App\Twill\Capsules\GoogleRecaptchas\Models\GoogleRecaptcha;
use App\Twill\Capsules\GoogleRecaptchas\Repositories\GoogleRecaptchaRepository;

class GoogleRecaptchaController extends ModuleController
{
    protected $moduleName = 'googleRecaptchas';

    protected $titleColumnKey = 'site_key';

    protected $indexOptions = ['edit' => false];

    public function redirectToEdit(GoogleRecaptchaRepository $pages): RedirectResponse
    {
        return redirect()->route('admin.config.googleRecaptchas.show', ['googleRecaptcha' => $pages->getPage()->id]);
    }

    /**
     * @param int $id
     * @param int|null $submoduleId
     */
    public function edit($id, $submoduleId = null): JsonResponse|RedirectResponse|View
    {
        $repository = new GoogleRecaptchaRepository(new GoogleRecaptcha());

        $repository->theOnlyOne();

        return parent::edit($id, $submoduleId);
    }

    protected function formData($request): array
    {
        return [
            'editableTitle' => false,
            'customTitle' => ' ',
        ];
    }
}
