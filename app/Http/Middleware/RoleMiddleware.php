<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to the login page if not authenticated
        }

        $userRole = Auth::user()->role;

        // Check if the user's role is in the allowed roles
        if (in_array($userRole, $roles)) {
            return $next($request); // User has an allowed role, grant access
        }

        // User is not authorized, redirect to an error page or home page
        return redirect()->back()->with('error', 'Unauthorized access.');
    }
}
