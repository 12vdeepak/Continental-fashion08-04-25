<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\CompanyRegistration;
use App\Models\Promotional;
use App\Models\Subscription;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $promoCount = Promotional::count();
        $bannerCount = Banner::count();
        $categoryCount = Category::count();
        $userCount = CompanyRegistration::count();

        return view('backend.layouts.dashboard', compact('categoryCount', 'bannerCount',  'promoCount', 'userCount'));
    }


    public function subscription()
    {
        $subscriptions = Subscription::latest()->get();
        return view('admin.subscription.index', compact('subscriptions'));
    }
    public function destroy($id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();

        return redirect()->route('subscriptions.index')->with('message', 'Subscription deleted successfully!');
    }
}
