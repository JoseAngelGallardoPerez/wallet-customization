<?php

namespace App\Http\Responses;

use App\Exceptions\ValidationException;
use App\Errors\Error;
use App\Errors\Validation\Factory;

/**
 * Class Json
 * @package App\Http\Responses
 */
class Json
{
    public static function ok()
    {
        $response = response()->json([], 200);
        $response->setContent("");
        $response->setStatusCode(200);
        $response->header('Content-Type', 'application/json');
        $response->header('charset', 'utf-8');
        return $response;
    }

    public static function response($data = [], $status = 200, bool $isUseDataWrapper = true)
    {
        if ($data === null) {
            return response('', $status);
        }

        $data = $isUseDataWrapper ? ['data' => $data] : $data;

        return response()->json($data, $status, ['charset' => 'utf-8']);
    }

    /**
     * @param ValidationException $exception
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public static function validationErrors(ValidationException $exception, $status = 422)
    {
        $errors = [];

        /** @var array $rules */
        foreach ($exception->getFailRules() as $attributeName => $rules) {
            $error = Factory::make($attributeName, $exception->errors()[$attributeName], $rules);
            $errors[] = self::getErrorArray($error);
        }

        return self::response(['errors' => $errors], $status, false);
    }

    /**
     * @param Error $error
     * @return \Illuminate\Http\JsonResponse
     */
    public static function error(Error $error)
    {
        return self::response(['errors' => [self::getErrorArray($error)]], $error->getCode(), false);
    }

    /**
     * @param Error $error
     * @return array
     */
    protected static function getErrorArray(Error $error)
    {
        return [
            'title' => "",
            'details' => "",
            'target' => $error->getTarget(),
            'source' => $error->getSource() ? $error->getSource() : null,
            'code' => $error->getErrorCode(),
            'meta' => !empty($error->getMeta()) ? $error->getMeta() : null
        ];
    }
}
