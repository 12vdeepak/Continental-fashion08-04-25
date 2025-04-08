<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function myCart()
    {
        $categories = Category::with('subcategories')->get();
        $companyUserId = session('company_user_id'); // Retrieve user ID from session

        // Fetch cart items for the user
        $cartItems = CartItem::with(['product', 'color', 'size', 'user'])
            ->where('user_id', $companyUserId)
            ->get();

        $cartCount = $cartItems->count(); // Count the cart items

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

        return view('frontend.product.my-cart', compact('categories', 'cartItems', 'cartCount', 'recentProducts', 'relatedProducts'));
    }


    // public function addToCart(Request $request)
    // {
    //     // Validate the request
    //     $request->validate([
    //         'product_id' => 'required|exists:products,id',
    //         'color_id' => 'nullable|exists:colors,id',
    //         'size_id' => 'nullable|exists:sizes,id',
    //         'quantity' => 'required|integer|min:1',
    //     ]);

    //     // Check if user is logged in
    //     if (!Session::has('company_user_id')) {
    //         return redirect()->route('frontend.login')
    //             ->with('error', 'Please login to add items to cart');
    //     }

    //     $userId = Session::get('company_user_id');
    //     $product = Product::findOrFail($request->product_id);

    //     // Get the appropriate price based on user's price category
    //     $user = \App\Models\CompanyRegistration::find($userId);
    //     $priceCategory = 'category_' . $user->price_category_type . '_price';
    //     $price = !empty($product->$priceCategory) ? $product->$priceCategory : $product->price;

    //     // Check if the item already exists in the cart
    //     $existingItem = CartItem::where('user_id', $userId)
    //         ->where('product_id', $request->product_id)
    //         ->where('color_id', $request->color_id)
    //         ->where('size_id', $request->size_id)
    //         ->first();

    //     if ($existingItem) {
    //         // Update quantity if item exists
    //         $existingItem->quantity += $request->quantity;
    //         $existingItem->save();
    //     } else {
    //         // Create new cart item
    //         CartItem::create([
    //             'user_id' => $userId,
    //             'product_id' => $request->product_id,
    //             'color_id' => $request->color_id,
    //             'size_id' => $request->size_id,
    //             'quantity' => $request->quantity,
    //             'price' => $price
    //         ]);
    //     }

    //     return redirect()->route('frontend.my-cart')->with('message', 'Product added to cart successfully!');
    // }


    public function addToCart(Request $request)
    {
        // Validate the request
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'color_id' => 'required|exists:colors,id',
            'size_id' => 'required|exists:sizes,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Check if user is logged in
        if (!Session::has('company_user_id')) {
            return redirect()->route('frontend.login')->with('error', 'Please login to add items to cart');
        }

        $userId = Session::get('company_user_id');
        $product = Product::findOrFail($request->product_id);

        // Get the appropriate price based on user's price category
        $user = \App\Models\CompanyRegistration::find($userId);
        $priceCategory = 'category_' . $user->price_category_type . '_price';
        $price = !empty($product->$priceCategory) ? $product->$priceCategory : $product->price;

        // Retrieve the correct product image based on product_id and color_id
        $productImage = \App\Models\ProductImage::where('product_id', $request->product_id)
            ->where('color_id', $request->color_id)
            ->first();

        if (!$productImage) {
            return redirect()->back()->with('error', 'Product image not found for selected color.');
        }

        // Get the product image size entry
        $productImageSize = \App\Models\ProductImageSize::where('product_image_id', $productImage->id)
            ->where('size_id', $request->size_id)
            ->first();

        // Check if enough stock is available
        if (!$productImageSize || $productImageSize->quantity < $request->quantity) {
            return redirect()->back()->with('message', 'Not enough stock available.');
        }

        // Check if the item already exists in the cart
        $existingItem = CartItem::where('user_id', $userId)
            ->where('product_id', $request->product_id)
            ->where('color_id', $request->color_id)
            ->where('size_id', $request->size_id)
            ->first();

        if ($existingItem) {
            // Check if there's enough stock for additional quantity
            if ($productImageSize->quantity < ($existingItem->quantity + $request->quantity)) {
                return redirect()->back()->with('message', 'Not enough stock available.');
            }

            // Update quantity if item exists
            $existingItem->quantity += $request->quantity;
            $existingItem->save();
        } else {
            // Create new cart item
            CartItem::create([
                'user_id' => $userId,
                'product_id' => $request->product_id,
                'color_id' => $request->color_id,
                'size_id' => $request->size_id,
                'quantity' => $request->quantity,
                'price' => $price
            ]);
        }

        // Reduce available quantity in product_image_size table
        $productImageSize->quantity -= $request->quantity;
        $productImageSize->save();

        return redirect()->route('frontend.my-cart')->with('message', 'Product added to cart successfully!');
    }



    // public function updateCartItem(Request $request, $id)
    // {
    //     $request->validate([
    //         'quantity' => 'required|integer|min:1'
    //     ]);

    //     $cartItem = CartItem::findOrFail($id);

    //     // Ensure the user is authorized
    //     if ($cartItem->user_id !== session('company_user_id')) {
    //         return redirect()->back()->with('warning', 'Unauthorized action');
    //     }

    //     // If the quantity is 1 and the user tries to decrement further, show a warning
    //     if ($cartItem->quantity == 1 && $request->quantity < 1) {
    //         return redirect()->back()->with('warning', 'You cannot have less than 1 product in the cart. Remove it instead.');
    //     }

    //     $cartItem->quantity = $request->quantity;
    //     $cartItem->save();

    //     return redirect()->back()->with('message', 'Cart updated successfully');
    // }

    public function updateCartItem(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = CartItem::findOrFail($id);

        // Ensure the user is authorized
        if ($cartItem->user_id !== session('company_user_id')) {
            return redirect()->back()->with('warning', 'Unauthorized action');
        }

        // Retrieve the product image based on product_id and color_id
        $productImage = \App\Models\ProductImage::where('product_id', $cartItem->product_id)
            ->where('color_id', $cartItem->color_id)
            ->first();

        if (!$productImage) {
            return redirect()->back()->with('error', 'Product image not found for selected color.');
        }

        // Get the product image size entry
        $productImageSize = \App\Models\ProductImageSize::where('product_image_id', $productImage->id)
            ->where('size_id', $cartItem->size_id)
            ->first();

        if (!$productImageSize) {
            return redirect()->back()->with('error', 'Product size not found.');
        }

        $previousQuantity = $cartItem->quantity;
        $newQuantity = $request->quantity;

        if ($newQuantity > $previousQuantity) {
            // If increasing quantity, check stock availability
            $quantityDifference = $newQuantity - $previousQuantity;
            if ($productImageSize->quantity < $quantityDifference) {
                return redirect()->back()->with('error', 'Not enough stock available.');
            }

            // Decrease available stock
            $productImageSize->quantity -= $quantityDifference;
        } else {
            // If decreasing quantity, add back to stock
            $quantityDifference = $previousQuantity - $newQuantity;
            $productImageSize->quantity += $quantityDifference;
        }

        // Save updated stock
        $productImageSize->save();

        // Update cart item quantity
        $cartItem->quantity = $newQuantity;
        $cartItem->save();

        return redirect()->back()->with('message', 'Cart updated successfully');
    }



    public function removeCartItem($id)
    {
        $cartItem = CartItem::findOrFail($id);

        if ($cartItem->user_id !== session('company_user_id')) {
            return redirect()->back()->with('warning', 'Unauthorized action');
        }

        $cartItem->delete();

        return redirect()->back()->with('message', 'Item removed from cart');
    }

    public function index()
    {
        //
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
