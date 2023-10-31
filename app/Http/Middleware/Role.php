<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Get the authenticated user
        $user = Auth::user();

        // Check if the user has any of the specified roles
        foreach ($roles as $role) {
            if ($user->role == $role) {
                return $next($request);
            }
        }

        // Redirect based on user's role
        if ($user->role == 'Admin') {
            return to_route('adminPage');
        } elseif ($user->role == 'Customer') {
            return to_route('customerPage');
        } else {
            return response()->json([
                'test'
            ]);
        }
    }
}
