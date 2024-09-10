<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;

class CheckRole
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed $roles (comma separated roles allowed)
     */
    public function handle($request, Closure $next, $roles)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            return response()->json(['error' => 'Token invalid or missing'], 401);
        }

        // Convert comma-separated roles into array
        $rolesArray = explode('|', $roles);

        if (!in_array($user->role, $rolesArray)) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return $next($request);
    }
}
