<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PriceRequest;
use App\Models\Price;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $price = Price::all();
        return view('admin.master-crud.price.index', compact('price'));
    }

    public function create()
    {
        return view('admin.master-crud.price.create');
    }

    public function store(PriceRequest $request)
    {
        // Create a new banner instance
        $price = new Price();
        $price->price_level = $request->input('price_level');


        // Save the Banner instance to the database
        $price->save();

        // Redirect back to the prefix index page
        return redirect()->route('price.index')->with('message', 'Price Level created successfully.');
    }

    public function edit($id)
    {
        $price = Price::findOrFail($id);
        return view('admin.master-crud.price.edit', compact('price'));
    }

    public function update(PriceRequest $request, $id)
    {
        $price = Price::findOrFail($id);

        // Handle the description update
        $price->price_level = $request->input('price_level');




        // Save the updated Banner instance to the database
        $price->save();

        return redirect()->route('price.index')->with('message', 'Price Level updated successfully.');
    }
    public function destroy($id)
    {
        $price = Price::findOrFail($id);



        $price->delete();
        return redirect()->route('price.index')->with('message', 'Price Level deleted successfully.');
    }
}
