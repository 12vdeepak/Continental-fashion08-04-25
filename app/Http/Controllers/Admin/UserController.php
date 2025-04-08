<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use App\Mail\UserApprovalMail;
use App\Models\Address;
use App\Models\CompanyRegistration;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = CompanyRegistration::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Display the specified user.
     */
    public function show($id)
    {
        $user = CompanyRegistration::findOrFail($id);
        return view('admin.user.show', compact('user'));
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy($id)
    {
        $user = CompanyRegistration::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('message', 'User deleted successfully.');
    }

    public function toggleStatus(CompanyRegistration $user)
    {
        // Toggle the status (0 = inactive, 1 = active)
        $user->is_approve = $user->is_approve == 0 ? 1 : 0;
        $user->save();

        // Send an email if the user is approved
        if ($user->is_approve == 1) {
            Mail::to($user->email)->send(new UserApprovalMail($user));
        }

        return redirect()->route('users.index')->with('message', 'User status updated successfully!');
    }

    public function assignCustomerID(CompanyRegistration $user)
    {
        return view('admin.user.assign_customer_id', compact('user'));
    }

    public function storeCustomerID(Request $request, CompanyRegistration $user)
    {
        $request->validate([
            'customer_id' => 'required|unique:company_registrations,customer_id,' . $user->id,
            'price_category_type' => 'required|in:1,2,3,4',
        ]);

        $user->customer_id = $request->customer_id;
        $user->price_category_type = $request->price_category_type; // Store the selected price category
        $user->save();

        return redirect()->route('users.index')->with('message', 'Customer ID and Price Category assigned successfully.');
    }


    public function showOrders(Request $request, $id)
    {
        // Fetch the specific user by ID
        $user = CompanyRegistration::find($id);

        // Check if user exists
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Start building the query
        $query = Order::where('user_id', $id)
            ->with(['product', 'size', 'color', 'address']);

        // Apply date filtering if both start and end dates are provided
        if ($request->has('start_date') && $request->has('end_date')) {
            $startDate = Carbon::parse($request->start_date)->startOfDay();
            $endDate = Carbon::parse($request->end_date)->endOfDay();
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        // Get filtered orders
        $orders = $query->latest()->get();

        // Check if orders exist
        if ($orders->isEmpty()) {
            return redirect()->back()->with('message', 'No orders found for this user.');
        }

        return view('admin.user.orders', compact('orders', 'user'));
    }


    // public function downloadFilteredInvoice(Request $request, $userId)
    // {
    //     // Validate the request parameters
    //     $request->validate([
    //         'start_date' => 'required|date',
    //         'end_date' => 'required|date|after_or_equal:start_date',
    //     ]);

    //     // Convert to Carbon instances
    //     $startDate = Carbon::parse($request->query('start_date'))->startOfDay();
    //     $endDate = Carbon::parse($request->query('end_date'))->endOfDay();

    //     // Fetch orders with products and their respective articles
    //     $orders = Order::where('user_id', $userId)
    //         ->whereBetween('created_at', [$startDate, $endDate])
    //         ->with(['product.article', 'size', 'color']) // Eager load products with article
    //         ->get();

    //     if ($orders->isEmpty()) {
    //         return back()->with('error', 'No orders found in the selected date range.');
    //     }

    //     // Fetch user details with multiple addresses
    //     $user = CompanyRegistration::with('address')->find($userId);
    //     if (!$user) {
    //         return back()->with('error', 'User not found.');
    //     }

    //     $companyRegistration = $user->company_registration ?? 'N/A';

    //     // Get Shipping Address (First Address)
    //     $userAddress = optional($user->address->first())->full_address ?? 'N/A';

    //     // Get Billing Address from the First Order's billing_address_id
    //     $billingAddress = 'N/A';
    //     if ($orders->first() && $orders->first()->billing_address_id) {
    //         $billing = Address::find($orders->first()->billing_address_id);
    //         $billingAddress = optional($billing)->full_address ?? 'N/A';
    //     }

    //     // Generate PDF
    //     $pdf = Pdf::loadView('admin.user.invoice2', compact('orders', 'userAddress', 'billingAddress', 'companyRegistration'));

    //     return $pdf->download('invoice_' . $startDate->format('Y-m-d') . '_to_' . $endDate->format('Y-m-d') . '.pdf');
    // }



    public function downloadFilteredInvoice(Request $request, $userId)
    {
        // Validate the request parameters
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Convert to Carbon instances
        $startDate = Carbon::parse($request->query('start_date'))->startOfDay();
        $endDate = Carbon::parse($request->query('end_date'))->endOfDay();

        // Fetch orders with products and their respective articles
        $orders = Order::where('user_id', $userId)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->with(['product.article', 'size', 'color']) // Eager load products with article
            ->get();

        if ($orders->isEmpty()) {
            return back()->with('error', 'No orders found in the selected date range.');
        }

        // Fetch user details with multiple addresses
        $user = CompanyRegistration::with('address')->find($userId);
        if (!$user) {
            return back()->with('error', 'User not found.');
        }

        $companyRegistration = $user->company_registration ?? 'N/A';

        // Get Shipping Address (First Address)
        $userAddress = optional($user->address->first())->full_address ?? 'N/A';

        // Get Billing Address from the First Order's billing_address_id
        $billingAddress = 'N/A';
        if ($orders->first() && $orders->first()->billing_address_id) {
            $billing = Address::find($orders->first()->billing_address_id);
            $billingAddress = optional($billing)->full_address ?? 'N/A';
        }

        // Generate PDF
        $pdf = Pdf::loadView('admin.user.invoice2', compact('orders', 'userAddress', 'billingAddress', 'companyRegistration'));

        // Generate PDF filename
        $filename = 'invoice_' . $startDate->format('Y-m-d') . '_to_' . $endDate->format('Y-m-d') . '.pdf';

        // Ensure the temp directory exists
        $tempPath = storage_path('app/temp');
        if (!file_exists($tempPath)) {
            mkdir($tempPath, 0777, true);
        }

        // Temporarily save the PDF to a file
        $pdfPath = $tempPath . '/' . $filename;
        $pdf->save($pdfPath);

        try {
            // Send email to user with PDF attachment
            Mail::to($user->email)->send(new InvoiceMail(
                $pdfPath,
                $filename,
                $startDate,
                $endDate
            ));

            // Download the PDF
            $response = response()->download($pdfPath, $filename, [
                'Content-Type' => 'application/pdf',
            ])->deleteFileAfterSend(true);

            return $response;
        } catch (\Exception $e) {
            // Log the error
            Log::error('Invoice Email Error: ' . $e->getMessage());

            // Delete the temporary PDF file if it exists
            if (file_exists($pdfPath)) {
                unlink($pdfPath);
            }

            // Return with error message
            return back()->with('error', 'Failed to send invoice email. Please try again.');
        }
    }








    public function editTracking($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.user.tracking_edit', compact('order'));
    }

    public function updateTracking(Request $request, $id)
    {
        $request->validate([
            'courier_partner_name' => 'required|string|max:255',
            'tracking_id' => 'required|string|max:255',
            'link' => 'required|url'
        ]);

        // Update or Add Tracking Info
        Order::where('id', $id)->update([
            'courier_partner_name' => $request->courier_partner_name,
            'tracking_id' => $request->tracking_id,
            'link' => $request->link
        ]);

        return redirect()->route('users.index')->with('message', 'Tracking information updated successfully.');
    }

    public function addDeliveryAndPayment(Request $request, $userId)
    {
        $request->validate([
            'delivery_charge' => 'required|numeric|min:0',
            'payment_terms' => 'required|string',
        ]);

        // Find all orders for the user
        $orders = Order::where('user_id', $userId)->get();

        if ($orders->isEmpty()) {
            return back()->with('error', 'No orders found for this user.');
        }

        // Update all orders for this user
        foreach ($orders as $order) {
            $order->update([
                'delivery_charge' => $request->delivery_charge,
                'payment_terms' => $request->payment_terms,
            ]);
        }

        return back()->with('message', 'Delivery Charge & Payment Terms updated successfully for all orders.');
    }
}
