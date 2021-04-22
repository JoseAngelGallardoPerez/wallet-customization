<?php

namespace App\Http\Controllers;

use App\Exceptions\ValidationException;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Http\Responses\Json;
use Illuminate\Http\Request;

/**
 * Class Controller
 * @package App\Http\Controllers
 */
class Controller extends BaseController
{
    /**
     * @param array $data
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createResponse($data = [], $status = 200)
    {
        return Json::response($data, $status);
    }

    /**
     * Throw the failed validation exception.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws ValidationException
     */
    protected function throwValidationException(Request $request, $validator)
    {
        throw new ValidationException($validator, $this->buildFailedValidationResponse(
            $request, $this->formatValidationErrors($validator)
        ));
    }
}
