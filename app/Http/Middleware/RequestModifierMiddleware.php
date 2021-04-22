<?php

namespace App\Http\Middleware;

use Closure;

/**
 * strip script tags and remove 'data' level
 *
 * Class RequestModifierMiddleware
 * @package App\Http\Middleware
 */
class RequestModifierMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $methods = [
            'POST',
            'PUT',
            'PATCH',
        ];
        if (in_array($request->getMethod(), $methods)) {
            $this->addFiledToRequestInput((array)$request->input('data', []), $request);
        }

        return $next($request);
    }

    /**
     * @param array $data
     * @param $request
     */
    private function addFiledToRequestInput(array $data, $request)
    {
        $inputs = $this->stripTagsInData($data);
        //$inputs['data'] = '';
        $request->request->replace($inputs);
    }

    /**
     * @param array $data
     * @return array
     */
    private function stripTagsInData(array $data)
    {
        $inputs = [];
        foreach ($data as $fieldName => $value) {
            if (is_string($value)) {
                $inputs[$fieldName] = $this->stripScriptTags($value);
            } elseif (is_array($value)) {
                $inputs[$fieldName] = $this->stripTagsInData($value);
            } else {
                $inputs[$fieldName] = $value;
            }
        }

        return $inputs;
    }

    /**
     * @param string $html
     * @return null|string|string[]
     */
    private function stripScriptTags(string $html)
    {
        return preg_replace('#<script(.*?)>(.*?)</script>#is', '', trim($html));
    }
}
