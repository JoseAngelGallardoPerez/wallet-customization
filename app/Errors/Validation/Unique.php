<?php

namespace App\Errors\Validation;

/**
 * Class Unique
 * @package App\Errors\Validation
 */
class Unique extends AbstractValidationError
{
    protected $errorCode = 'UNIQUE';

    /**
     * @param string $key
     * @param $value
     * @return $this
     */
    public function addMeta(string $key, $value)
    {
        //do nothing
        return $this;
    }
}
