<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Auth\Events\Login;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Sanctum\PersonalAccessToken;
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

        if ($request->bearerToken() || request('auth-key') ?? false) {

            $token =  $request->query('auth-key') ?? $request->bearerToken();

            $key = PersonalAccessToken::findToken($token);

            if (!empty($key->id)) {

                return $next($request);
            }


            return response()->json([
                'ok' => false,
                'msg' => 'auth key is invalid'
            ], Response::HTTP_BAD_REQUEST);
        }

        return response()->json([
            'ok' => false,
            'msg' => 'You are not authorized to access this API.'
        ], Response::HTTP_UNAUTHORIZED);
    }
}
