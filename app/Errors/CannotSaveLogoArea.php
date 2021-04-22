<?php

namespace App\Errors;

class CannotSaveLogoArea extends Error
{
    protected $code = 400;
    protected $errorCode = 'CANNOT_SAVE_LOGO_AREA';
    protected $title = '';

    public function __construct($msg)
    {
        $this->title = $msg;

        parent::__construct($msg);
    }
}
