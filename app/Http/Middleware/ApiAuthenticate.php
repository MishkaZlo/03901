<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiAuthenticate
{
    const HEADER_API_TOKEN = 'x-api-key';

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header(self::HEADER_API_TOKEN);
        if ($token === null || $token !== config('services.api.token')) {

            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
