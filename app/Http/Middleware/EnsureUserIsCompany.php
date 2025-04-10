<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class EnsureUserIsCompany
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the pharmacy_id exists in the session
        if (Session::has('company_user_id')) {
            return $next($request);
        }

        // If not authenticated, redirect to a public page or login
        return redirect()->route('frontend.login')->with('message', 'You need to sign up or Login to proceed.');
    }
}
