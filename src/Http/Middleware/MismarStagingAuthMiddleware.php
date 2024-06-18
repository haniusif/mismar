<?php

namespace Modules\Mismar\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MismarStagingAuthMiddleware
{
    private const UNAUTHORIZED_MESSAGE = ['error' => 'Unauthorized'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $authHeader = $request->header('Authorization');

        if (!$authHeader || !preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
            // If the Authorization header is missing or does not contain a Bearer token, return a 401 response
            return response()->json(self::UNAUTHORIZED_MESSAGE, Response::HTTP_UNAUTHORIZED);
        }

        $token = $matches[1];
        $stagingToken = config('mismar.token.staging_token');

        if ($token !== $stagingToken) {
            // If the token is invalid, return a 401 response
            return response()->json(self::UNAUTHORIZED_MESSAGE, Response::HTTP_UNAUTHORIZED);
        }

        // Proceed with the request
        return $next($request);
    }
}
