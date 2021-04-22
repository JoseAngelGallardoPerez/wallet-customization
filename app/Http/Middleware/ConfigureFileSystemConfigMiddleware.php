<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Class ConfigureFileSystemConfigMiddleware
 * @package App\Http\Middleware
 */
class ConfigureFileSystemConfigMiddleware
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $scheme = in_array($request->server('HTTP_X_FORWARDED_SSL'), ['on']) ? 'https' : 'http';
        $appUrl = $scheme . '://' . $request->getHttpHost();

        putenv("APP_URL=" . $appUrl);
        app('app')->configure('filesystems');

        return $next($request);
    }
}
