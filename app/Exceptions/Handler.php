<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Http\Responses\Json as ResponsesJson;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use App\Errors\NotFound;
use App\Errors\BadRequest;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param Exception $exception
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof ValidationException) {
            return ResponsesJson::validationErrors($exception);
        } elseif (
            $exception instanceof NotFoundHttpException
            || $exception instanceof ModelNotFoundException
            || $exception instanceof MethodNotAllowedHttpException
        ) {
            return ResponsesJson::error(new NotFound());
        } elseif ($exception instanceof CustomException) {
            return ResponsesJson::error($exception->getError());
        }

        return ResponsesJson::error(new BadRequest());
    }
}
