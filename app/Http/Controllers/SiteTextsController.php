<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customization;
use App\Services\SiteTextUpdater;

/**
 * Class SiteTextsController
 * @package App\Http\Controllers
 */
class SiteTextsController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function get()
    {
        $texts = Customization::findSiteTexts();

        return $this->createResponse($this->getData($texts));
    }

    /**
     * @param Request $request
     * @param SiteTextUpdater $updater
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Throwable
     */
    public function update(Request $request, SiteTextUpdater $updater)
    {
        $this->validate($request, [
            Customization::KEY_TERMS_AND_CONDITIONS => 'required|max:50000|string|min:2',
            Customization::KEY_FIRST_LOGIN_TEXT => 'max:50000|string|min:2',
            Customization::KEY_SECOND_LOGIN_TEXT => 'max:50000|string|min:2',
            Customization::KEY_THIRD_LOGIN_TEXT => 'max:50000|string|min:2',
        ]);

        $updater->update($request);

        return $this->createResponse($this->getData(Customization::findSiteTexts()));
    }

    /**
     * @param \Illuminate\Database\Eloquent\Collection $texts
     * @return array
     */
    private function getData(\Illuminate\Database\Eloquent\Collection $texts)
    {
        $result = [];
        /** @var Customization $textItem */
        foreach ($texts as $textItem) {
            $result[] = [
                'key' => $textItem->key,
                'label' => $textItem->label,
                'value' => $textItem->getTypedValue(),
            ];
        }

        return $result;
    }
}
