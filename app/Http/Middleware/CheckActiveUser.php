<?php

namespace App\Http\Middleware;

use App\Constants\User\UserStatusConstants;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckActiveUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->status == UserStatusConstants::INACTIVE) {
            return redirect()->back()->with('error', 'The account is inactive, please wait for the administrator to activate your account.');
        }
        return $next($request);
    }
}
