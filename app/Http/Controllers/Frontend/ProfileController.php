<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Category;
use App\Models\Order;
use App\Models\CompanyRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function manageProfile()
    {
        $categories = Category::with('subcategories')->get();
        $user = CompanyRegistration::find(session('company_user_id'));
        return view('frontend.my-profile.my-profile', compact('categories', 'user'));
    }


    public function deleteAccount()
    {
        // Get user ID from session
        $userId = session('company_user_id');

        if (!$userId) {
            return redirect()->back()->with('error', 'No user found in session.');
        }

        $user = CompanyRegistration::find($userId);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Soft delete instead of permanent deletion
        $user->delete();

        // Clear session and log out
        session()->forget('company_user_id');

        // Optional: Destroy session completely
        session()->flush();


        return redirect('/')->with('message', 'Your account has been deleted.');
    }

    public function myOrder()
    {
        $categories = Category::with('subcategories')->get();

        // Get the logged-in user
        $user = CompanyRegistration::find(session('company_user_id'));

        // Fetch orders with related product images filtered by color
        $orders = Order::where('user_id', $user->id)
            ->with([
                'product.images' => function ($query) {
                    $query->orderBy('id', 'asc');
                },
                'product.wear', // Ensure wear (gender) is included
                'size',
                'color',
                'address'
            ])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend.my-profile.my-order', compact('categories', 'orders'));
    }




    public function manageAddress()
    {
        $categories = Category::with('subcategories')->get();
        $userId = session('company_user_id'); // Fetch user ID from session
        $addresses = Address::where('user_id', $userId)->get();
        return view('frontend.my-profile.manage-address', compact('categories', 'addresses'));
    }

    public function store(Request $request)
    {
        $userId = session('company_user_id'); // Get user ID from session

        if (!$userId) {
            return redirect()->back()->withErrors(['error' => 'Unauthorized']);
        }

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'phone_number' => 'required|numeric|digits_between:7,15',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Address::create([
            'user_id' => $userId,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company_name' => $request->company_name,
            'street' => $request->street,
            'zip_code' => $request->zip_code,
            'city' => $request->city,
            'country' => $request->country,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('frontend.manageaddress')->with('message', 'Address added successfully!');
    }

    public function destroy($id)
    {
        Address::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Address deleted successfully!');
    }


    public function manageSetting()
    {
        $categories = Category::with('subcategories')->get();
        return view('frontend.my-profile.settings', compact('categories'));
    }

    public function editProfile()
    {
        $categories = Category::with('subcategories')->get();

        // Fetch the authenticated user's data from session
        $user = CompanyRegistration::find(session('company_user_id'));

        return view('frontend.my-profile.edit-profile', compact('categories', 'user'));
    }

    public function updateProfile(Request $request)
    {
        $user = CompanyRegistration::find(session('company_user_id'));

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $request->validate([
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:company_registrations,email,' . $user->id,
            'phone_number' => 'required|string|max:20',
            'company_name' => 'nullable|string|max:255',
            'street' => 'nullable|string|max:255',
        ]);

        // Handle image upload
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
            $user->profile_image = $imagePath;
        }

        // Check if email is changed
        $emailChanged = $user->email !== $request->email;

        // Update user details
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->company_name = $request->company_name;
        $user->street = $request->street;
        $user->save();

        // If email is changed, log out manually and redirect to login
        if ($emailChanged) {
            session()->forget('company_user_id'); // Remove user session
            session()->flush(); // Optional: Completely clear the session

            return redirect()->route('frontend.login')->with([
                'message' => 'Email updated successfully. Please log in again.',
                'alert-type' => 'success'
            ]);
        }

        return redirect()->back()->with('message', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = CompanyRegistration::find(session('company_user_id'));

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Old password is incorrect']);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('message', 'Password updated successfully!');
    }
}