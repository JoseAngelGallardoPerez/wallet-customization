<?php

namespace App\Errors;

class CannotEditDefaultScheme extends Error
{
    protected $code = 422;
    protected $title = "You cannot edit default scheme";
    protected $errorCode = 'CANNOT_EDIT_DEFAULT_SCHEME';
}
