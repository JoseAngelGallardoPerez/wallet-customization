<?php

namespace App\Errors;

class ApiClientBadRequest extends Error
{
    protected $code = 400;
    protected $title = "Bad Request";
    protected $errorCode = 'BAD_REQUEST';

    public function getMess()
    {
        if(env('ENV') == 'development'){
            return parent::getMessage();
        } else {
            return 'Bad Request .';
        }
    }
}
