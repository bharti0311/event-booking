<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check what Laravel receives
        \Log::info('Authorization header:', ['header' => $request->header('Authorization')]);

        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['error'=>'Token expired'], 401);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['error'=>'Token invalid'], 401);
        } catch (\Exception $e) {
            return response()->json(['error'=>'Token not provided'], 401);
        }

        return $next($request);
    }
}

