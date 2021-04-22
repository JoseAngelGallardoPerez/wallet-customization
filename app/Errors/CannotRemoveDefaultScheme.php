<?php

namespace App\Errors;

class CannotRemoveDefaultScheme extends Error
{
    protected $code = 422;
    protected $title = "You cannot remove default scheme";
    protected $errorCode = 'CANNOT_REMOVE_DEFAULT_SCHEME';
}
