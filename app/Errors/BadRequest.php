<?php

namespace App\Errors;

class BadRequest extends Error
{
    protected $code = 400;
    protected $title = "Bad Request";
    protected $errorCode = 'BAD_REQUEST';
}
