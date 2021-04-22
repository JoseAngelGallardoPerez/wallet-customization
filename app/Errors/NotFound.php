<?php

namespace App\Errors;

class NotFound extends Error
{
    protected $code = 404;
    protected $title = "Not Found";
    protected $errorCode = 'NOT_FOUND';
}
