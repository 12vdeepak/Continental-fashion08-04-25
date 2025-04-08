<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CompanyLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Frontend\CompanyRegistrationRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\CompanyRegistration;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountCreatedMail;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function userLogin(Request $request)
    {
        $categories = Category::with('subcategories')->get();
        return view('frontend.auth.login', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function userRegister()
    {
        $categories = Category::with('subcategories')->get();
        return view('frontend.auth.register', compact('categories'));
    }

    public function login(CompanyLoginRequest $request)
    {
        // Find user by email, including soft-deleted ones
        $user = CompanyRegistration::withTrashed()->where('email', $request->email)->first();

        // If user exists
        if ($user) {
            // Check if the account is soft-deleted
            if ($user->deleted_at !== null) {
                return redirect()->back()->with([
                    'message' => 'Your account has been deleted. Please contact support.',
                    'alert-type' => 'error'
                ]);
            }

            // Check if password is correct
            if (Hash::check($request->password, $user->password)) {
                // Check if the account is approved
                if ($user->is_approve == 1) {
                    session(['company_user_id' => $user->id]); // Store user ID in session
                    return redirect()->route('frontend.home.private')->with([
                        'message' => 'Login successful!',
                        'alert-type' => 'success'
                    ]);
                } else {
                    return redirect()->back()->with([
                        'message' => 'Your account is pending approval. Please wait for admin approval.',
                        'alert-type' => 'warning'
                    ]);
                }
            }
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }




    public function logout(Request $request)
    {
        // Remove user session
        session()->forget('company_user_id');

        // Optional: Destroy session completely
        session()->flush();

        // Redirect to login page with a success message
        return redirect()->route('frontend.login')->with([
            'message' => 'Logout successful!',
            'alert-type' => 'success'
        ]);
    }



    public function register(CompanyRegistrationRequest $request)
    {
        try {
            DB::beginTransaction();

            // Ensure database connection is active
            if (!DB::connection()->getPdo()) {
                throw new \Exception("Database connection failed.");
            }

            // Handle file upload if present
            $businessRegistrationPath = null;
            if ($request->hasFile('business_registration_file')) {
                $businessRegistrationPath = $request->file('business_registration_file')
                    ->store('business_registrations', 'public');
            }

            // Ensure password is being passed correctly
            if (!$request->filled('new_password')) {
                throw new \Exception("Password field is empty.");
            }

            // Create the registration record
            $registration = CompanyRegistration::create([
                'company_name'                => $request->input('company_name'),
                'street'                      => $request->input('street'),
                'zip_code'                    => $request->input('zip_code'),
                'city'                        => $request->input('city'),
                'country'                     => $request->input('country'),
                'phone_number'                => $request->input('phone_number'),
                'gender'                      => $request->input('gender'),
                'first_name'                  => $request->input('first_name'),
                'last_name'                   => $request->input('last_name'),
                'supervisory'                 => $request->input('supervisory'),
                'email'                       => $request->input('email'),
                'password'                    => Hash::make($request->input('new_password')),
                'vat_id_number'               => $request->input('vat_id_number'),
                'business_registration_file'  => $businessRegistrationPath,
                'note'                        => $request->input('note'),
                'terms_accepted'              => true,
            ]);

            if (!$registration) {
                throw new \Exception("Failed to create company registration.");
            }

            DB::commit();

            // Send confirmation email
            Mail::to($registration->email)->send(new AccountCreatedMail($registration));

            return redirect()->route('frontend.register')->with([
                'message' => 'Registration successful! Please check your email for confirmation.',
                'alert-type' => 'success'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Registration failed: ' . $e->getMessage(), [
                'user_input' => $request->except(['new_password', 'confirm_password']),
                'error'      => $e->getMessage(),
                'trace'      => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->with('error', 'Registration failed: ' . $e->getMessage())
                ->withInput($request->except(['new_password', 'confirm_password']));
        }
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