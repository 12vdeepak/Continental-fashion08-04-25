<?php

namespace App\Http\Middleware;

use App\Models\CompanyRegistration;
use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompanyAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Debug: Check if session data exists
        // dd(Session::all());

        $companyId = Session::get('company_user_id');

        if (!$companyId) {
            return redirect()->route('frontend.login')->with(['message' => 'Please log in to continue.']);
        }

        $company = CompanyRegistration::find($companyId);

        if (!$company || $company->is_approve != 1) {
            Session::forget('company_user_id');
            return redirect()->route('frontend.home')->with([
                'message' => 'Your account is pending approval. Please wait for admin approval.',
                'alert-type' => 'warning'
            ]);
        }

        return $next($request);
    }
}
