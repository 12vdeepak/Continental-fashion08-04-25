<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CookieSettingsController extends Controller
{
    public function index()
    {
        return view('cookies.settings');
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'analytics' => 'sometimes|boolean',
            'marketing' => 'sometimes|boolean',
        ]);

        // Set main consent cookie
        Cookie::queue('laravel_cookie_consent', 'true', 60 * 24 * 365);

        // Set specific cookie preferences
        Cookie::queue('analytics_cookies', $request->analytics ? 'true' : 'false', 60 * 24 * 365);
        Cookie::queue('marketing_cookies', $request->marketing ? 'true' : 'false', 60 * 24 * 365);

        return redirect()->back()->with('status', 'Cookie preferences saved!');
    }
}
