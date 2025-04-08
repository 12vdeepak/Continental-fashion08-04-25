<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DiscountRequest;
use App\Models\Discount;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discount = Discount::all();
        return view('admin.master-crud.discount.index', compact('discount'));
    }

    public function create()
    {
        return view('admin.master-crud.discount.create');
    }

    public function store(DiscountRequest $request)
    {
        // Create a new banner instance
        $discount = new Discount();
        $discount->discount_percentage = $request->input('discount_percentage');


        // Save the Banner instance to the database
        $discount->save();

        // Redirect back to the prefix index page
        return redirect()->route('discount.index')->with('message', 'Discount percentage created successfully.');
    }

    public function edit($id)
    {
        $discount = Discount::findOrFail($id);
        return view('admin.master-crud.discount.edit', compact('discount'));
    }

    public function update(DiscountRequest $request, $id)
    {
        $discount = Discount::findOrFail($id);

        // Handle the description update
        $discount->discount_percentage = $request->input('discount_percentage');




        // Save the updated Banner instance to the database
        $discount->save();

        return redirect()->route('discount.index')->with('message', 'Discount percentage updated successfully.');
    }
    public function destroy($id)
    {
        $discount = Discount::findOrFail($id);



        $discount->delete();
        return redirect()->route('discount.index')->with('message', 'Discount percentage deleted successfully.');
    }
}
