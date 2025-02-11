<?php

namespace App\Http\Middleware;

use App\Constants\User\UserRoleConstants;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() && Auth::user()->role !== array_keys(UserRoleConstants::ROLES)) {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
