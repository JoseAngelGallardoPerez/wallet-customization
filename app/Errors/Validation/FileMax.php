<?php

namespace App\Errors\Validation;

class FileMax extends AbstractValidationError
{
    protected $meta = [
        'measure' => 'kilobytes'
    ];
    protected $errorCode = 'FILE_MAX';
}
