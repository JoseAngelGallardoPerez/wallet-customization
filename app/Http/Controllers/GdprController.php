<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customization;

/**
 * Class GdprController
 * @package App\Http\Controllers
 */
class GdprController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function get()
    {
        $gdpr = Customization::findOrFailGdpr();

        return $this->createResponse($this->getData($gdpr));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $gdpr = Customization::findOrFailGdpr();

        $result = $this->validate($request, [
            'label' => 'required|max:255|string|min:2',
            'text' => 'required|max:50000|string|min:10',
        ]);

        $gdpr->label = $result['label'];
        $gdpr->value = $result['text'];
        $gdpr->save();

        return $this->createResponse($this->getData($gdpr));
    }

    /**
     * @param Customization $gdpr
     * @return array
     */
    private function getData(Customization $gdpr)
    {
        return [
            'label' => $gdpr->label,
            'text' => $gdpr->value,
        ];
    }
}
