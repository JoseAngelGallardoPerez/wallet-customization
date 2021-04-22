<?php

namespace App\Errors;

class CannotRemoveActiveScheme extends Error
{
    protected $code = 422;
    protected $title = "You cannot remove active scheme";
    protected $errorCode = 'CANNOT_REMOVE_ACTIVE_SCHEME';
}
