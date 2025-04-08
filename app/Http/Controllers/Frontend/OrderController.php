<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Mail\OrderPlacedMail;
use App\Models\Address;
use App\Models\CartItem;
use App\Models\CompanyRegistration;
use App\Models\Order;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{


    public function storeOrder(Request $request)
    {
        try {
            $companyUserId = session('company_user_id');

            if (!$companyUserId) {
                return redirect()->back()->with('error', 'User session expired. Please log in again.');
            }

            // Retrieve delivery and billing addresses from request
            $deliveryAddressId = $request->address_id ?? session('selected_delivery_address_id');
            $billingAddressId = $request->billing_address_id ?? session('selected_billing_address_id');

            // Validate selected addresses
            $deliveryAddress = Address::find($deliveryAddressId);
            $billingAddress = Address::find($billingAddressId);

            if (!$deliveryAddress) {
                return redirect()->back()->with('error', 'Please select a valid delivery address.');
            }

            if (!$billingAddress) {
                return redirect()->back()->with('error', 'Please select a valid billing address.');
            }

            // Fetch user email from company_registrations table
            $userEmail = CompanyRegistration::where('id', $companyUserId)->value('email');

            // Fetch cart items
            $cartItems = CartItem::with(['product', 'color', 'size'])
                ->where('user_id', $companyUserId)
                ->get();

            if ($cartItems->isEmpty()) {
                return redirect()->back()->with('error', 'Your cart is empty.');
            }

            $orderDetails = [];

            foreach ($cartItems as $item) {
                $order = Order::create([
                    'user_id' => $companyUserId,
                    'address_id' => $deliveryAddress->id,  // Store Delivery Address
                    'billing_address_id' => $billingAddress->id, // Store Billing Address
                    'product_id' => $item->product_id,
                    'color_id' => $item->color_id,
                    'size_id' => $item->size_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'amount' => $item->price * $item->quantity,
                    'status' => 'pending',
                ]);

                // Fetch product image
                $productImage = ProductImage::where('product_id', $item->product_id)
                    ->where('color_id', $item->color_id)
                    ->first();

                $orderDetails[] = [
                    'order_id' => $order->id,
                    'product_name' => $item->product->product_name ?? 'N/A',
                    'color' => $item->color->color_code ?? 'N/A',
                    'size' => $item->size->size_name ?? 'N/A',
                    'quantity' => $item->quantity,
                    'unit_price' => $item->price,
                    'total_price' => $item->price * $item->quantity,
                    'product_image' => $productImage ? asset('storage/' . $productImage->image_path) : asset('frontend/assets/images/default.png'),
                ];
            }

            // Clear cart after order placement
            CartItem::where('user_id', $companyUserId)->delete();

            // ✅ Send order confirmation email
            Mail::to($userEmail)->send(new OrderPlacedMail($orderDetails));

            // Store order details in session for confirmation page
            session()->flash('orderDetails', $orderDetails);
            session()->flash('message', 'Order placed successfully!');

            return redirect()->route('frontend.confirm-order')->with([
                'orderDetails' => $orderDetails,
                'message' => 'Order placed successfully!',
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}