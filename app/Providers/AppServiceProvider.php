<?php

namespace App\Providers;

use App\Models\Color;
use App\Models\Size;
use App\Models\Banner;
use App\Models\CartItem;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $colors = Color::all();
        $sizes = Size::all();
        $banners = Banner::where('status', 1)->get();

        // Share colors, sizes, and banners globally
        View::share([
            'colors' => $colors,
            'sizes' => $sizes,
            'banners' => $banners
        ]);

        // Use a View Composer for dynamic cart count
        View::composer('*', function ($view) {
            $companyUserId = session('company_user_id');
            $cartCount = 0; // Default cart count

            if ($companyUserId) {
                $cartCount = CartItem::where('user_id', $companyUserId)->count();
            }

            $view->with('cartCount', $cartCount);
        });
    }
}
