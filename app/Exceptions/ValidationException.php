<?php

namespace App\Exceptions;

/**
 * Class ValidationException
 * @package App\Exceptions
 */
class ValidationException extends \Illuminate\Validation\ValidationException
{
    /**
     * @return array
     */
    public function getFailRules()
    {
        return $this->validator->failed();
    }
}
