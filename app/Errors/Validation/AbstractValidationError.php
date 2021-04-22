<?php

namespace App\Errors\Validation;

use App\Errors\Error;

/**
 * Class AbstractValidationError
 * @package App\Errors\Validation
 */
abstract class AbstractValidationError extends Error
{
    protected $target = self::TARGET_FIELD;
}
