<?php

namespace App\Errors;

class ApiClientForbidden extends Error
{
    protected $code = 403;
    protected $title = "Forbidden";
    protected $errorCode = 'FORBIDDEN';
}
