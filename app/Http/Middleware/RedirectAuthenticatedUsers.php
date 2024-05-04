<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectAuthenticatedUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            $role = auth()->user()->role;

            // Redirect the user based on their role
            switch ($role) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                    break;
                case 'professional':
                    return redirect()->route('professional.index');
                    break;
                default:
                    return redirect()->route('login');
                    break;
            }
        }

        return $next($request);
    }
}