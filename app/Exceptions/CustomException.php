<?php

namespace App\Exceptions;

use App\Errors\Error;
use Throwable;

/**
 * Class CustomException
 * @package App\Exceptions
 */
class CustomException extends \DomainException
{
    /**
     * @var Error
     */
    private $error;

    /**
     * CustomException constructor.
     * @param Error $error
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(Error $error, string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->error = $error;
    }

    /**
     * @return Error
     */
    public function getError()
    {
        return $this->error;
    }
}
