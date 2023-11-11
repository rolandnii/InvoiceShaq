<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Log::error(request('token'));

        // if ($request->bearerToken() || request('token') ?? false) {
            return $next($request);
        // }

        // return response()->json([
        //     'ok' => false,
        //     'msg' => 'You are not authorized to access this API. Please authenticate and try again.'
        // ], Response::HTTP_UNAUTHORIZED);
    }
}
