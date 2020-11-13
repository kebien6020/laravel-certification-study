<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogRequests
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        Log::debug('LogRequests Before', [
            'request' => $request,
        ]);
        $response = $next($request);

        Log::debug('LogRequests After', [
            'response' => $response
        ]);

        return $response;
    }
}
