<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function allProduct(Request $request)
    {
        $sortBy = $request->query('sort', 'newest'); // Default sorting by newest

        $query = Product::with(['brand', 'images', 'colors', 'imageColors', 'sizes', 'article', 'promotion', 'category', 'wear']);

        // Apply sorting
        switch ($sortBy) {
            case 'price_low_high':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high_low':
                $query->orderBy('price', 'desc');
                break;
            default: // Newest by default
                $query->orderBy('created_at', 'desc');
                break;
        }

        $products = $query->paginate(9); // 9 products per page
        $categories = Category::with('subcategories')->get();

        return view('frontend.product.all-product', compact('products', 'categories', 'sortBy'));
    }




    public function specialProduct()
    {
        $categories = Category::with('subcategories')->get();
        return view('frontend.specialproduct', compact('categories'));
    }

    public function productPage($id)
    {
        $product = Product::with(['brand', 'images', 'colors', 'imageColors', 'sizes', 'article', 'promotion', 'category', 'weight', 'wear', 'images.sizes'])
            ->find($id);

        if (!$product) {
            return redirect()->route('frontend.home')->withErrors(['error' => 'Product not available']);
        }

        // Fetch related products based on category
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->latest()
            ->take(6)
            ->get();

        // Fetch recent products without status filtering
        $recentProducts = Product::latest()
            ->take(6)
            ->get();
        $categories = Category::with('subcategories')->get();

        return view('frontend.product.product-page', compact('product', 'relatedProducts', 'recentProducts', 'categories'));
    }



    public function confirmOrder(Request $request)
    {
        $categories = Category::with('subcategories')->get();
        $companyUserId = session('company_user_id'); // Retrieve user ID from session

        // Fetch all addresses for the user
        $addresses = Address::where('user_id', $companyUserId)->get();

        // Fetch selected addresses from request or session
        $selectedAddressId = $request->delivery_address_id ?? session('selected_address_id');
        $selectedBillingAddressId = $request->billing_address_id ?? session('selected_billing_address_id');

        // Find the selected addresses, defaulting to the first if not found
        $selectedAddress = $addresses->where('id', $selectedAddressId)->first() ?? $addresses->first();
        $selectedBillingAddress = $addresses->where('id', $selectedBillingAddressId)->first() ?? $addresses->first();


        // dd($selectedAddress);

        // Store selected addresses in session
        session([
            'selected_address_id' => $selectedAddress->id ?? null,
            'selected_billing_address_id' => $selectedBillingAddress->id ?? null,
        ]);

        // Fetch cart items for the user
        $cartItems = CartItem::with(['product', 'color', 'size', 'user'])
            ->where('user_id', $companyUserId)
            ->get();

        // Fetch recent products (latest 6)
        $recentProducts = Product::latest()->take(6)->get();

        // Fetch related products based on the category of the first item in the cart (if available)
        $relatedProducts = collect(); // Default empty collection
        if ($cartItems->isNotEmpty()) {
            $firstProductCategoryId = $cartItems->first()->product->category_id ?? null;
            if ($firstProductCategoryId) {
                $relatedProducts = Product::where('category_id', $firstProductCategoryId)
                    ->whereNotIn('id', $cartItems->pluck('product_id')) // Exclude products already in the cart
                    ->latest()
                    ->take(6)
                    ->get();
            }
        }

        return view('frontend.product.confirm-order', compact(
            'categories',
            'addresses',
            'selectedAddress',
            'selectedBillingAddress',
            'cartItems',
            'recentProducts',
            'relatedProducts'
        ));
    }






    public function productLogged()
    {
        $categories = Category::with('subcategories')->get();
        return view('frontend.product.product-page-logged-in', compact('categories'));
    }

    public function subcategoryProducts($id)
    {
        $categories = Category::with('subcategories')->get();
        $subcategory = SubCategory::findOrFail($id);

        // Use paginate() instead of accessing products as a collection
        $products = $subcategory->products()->with('images')->paginate(9);

        return view('frontend.product.index', compact('subcategory', 'categories', 'products'));
    }





    // public function selectAddress()
    // {
    //     $categories = Category::with('subcategories')->get();
    //     return view('frontend.product.select-address', compact('categories'));
    // }

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