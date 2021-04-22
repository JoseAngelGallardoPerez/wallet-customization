<?php

namespace App\Errors\Validation;

class FileExists extends AbstractValidationError
{
    protected $errorCode = 'FILE_NOT_FOUND';
}
