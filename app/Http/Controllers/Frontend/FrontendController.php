<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Faq;
use App\Models\NewsOffer;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function publicHome()
    {
        $products = Product::with(['brands', 'images', 'colors', 'sizes'])->get();
        $categories = Category::with('subcategories')->get();
        $banners = Banner::all();
        $newsOffers = NewsOffer::where('status', 1)->get();
        $brands = Brand::whereNotNull('brand_logo')->get(); // Fetch brands with logos

        return view('frontend.product.public-home', compact('products', 'categories', 'banners', 'newsOffers', 'brands'));
    }



    public function publicPrivateHome()
    {
        $products = Product::with(['brands', 'images', 'colors', 'sizes'])->get();
        $categories = Category::with('subcategories')->get();
        $banners = Banner::all();
        $newsOffers = NewsOffer::where('status', 1)->get();
        $brands = Brand::whereNotNull('brand_logo')->get(); // Fetch brands with logos

        return view('frontend.product.public-home', compact('products', 'categories', 'banners', 'newsOffers', 'brands'));
    }

    public function aboutUs()
    {
        $categories = Category::with('subcategories')->get();
        return view('frontend.aboutus', compact('categories'));
    }

    public function terms()
    {
        $categories = Category::with('subcategories')->get();
        return view('frontend.product.terms-and-condition', compact('categories'));
    }


    public function imprint()
    {
        $categories = Category::with('subcategories')->get();
        return view('frontend.imprint', compact('categories'));
    }

    public function showFaqs()
    {
        $categories = Category::with('subcategories')->get();
        $faqs = Faq::where('status', 1)->get();
        return view('frontend.faqs', compact('faqs', 'categories'));
    }
    
     public function privacy()
    {
        $categories = Category::with('subcategories')->get();

        return view('frontend.privacy', compact('categories'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
