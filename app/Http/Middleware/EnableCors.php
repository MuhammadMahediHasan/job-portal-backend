<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnableCors
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $headers = [
            'Access-Control-Allow-Origin' => '*', // Replace with the allowed origin(s)
            'Access-Control-Allow-Methods' => '*',
            'Access-Control-Allow-Headers' => 'Content-Type, Authorization,  Origin, X-Requested-With,Authorization, Accept',
            'Access-Control-Allow-Credentials' => 'true',
        ];

        if ($request->isMethod('OPTIONS')) {
            return response()->json(['method' => 'OPTIONS'], 200, $headers);
        }

        $response = $next($request);

        foreach ($headers as $key => $value) {
            $response->header($key, $value);
        }

        return $response;
    }
}
