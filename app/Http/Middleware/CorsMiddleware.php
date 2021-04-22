<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Class CorsMiddleware
 * @package App\Http\Middleware
 */
class CorsMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $this->setTrustedProxiesForRequest($request);
        $corsConfig = config('cors');
        $headers = [
            'Access-Control-Allow-Origin' => $corsConfig['origin'],
            'Access-Control-Allow-Methods' => $corsConfig['methods'],
            'Access-Control-Allow-Credentials' => $corsConfig['credentials'],
            'Access-Control-Allow-Headers' => $corsConfig['headers'],
        ];

        if ($request->isMethod('OPTIONS')) {
            return response()->json('{"method":"OPTIONS"}', 200, $headers);
        }

        $response = $next($request);
        foreach ($headers as $key => $value) {
            $response->header($key, $value);
        }

        return $response;
    }

    /**
     * @param Request $request
     */
    private function setTrustedProxiesForRequest(Request $request)
    {
        if (empty($request->getTrustedProxies())) {
            $args = [$request->getClientIps()];

            array_push($args, Request::HEADER_X_FORWARDED_ALL);

            call_user_func_array([$request, 'setTrustedProxies'], $args);
        }
    }
}