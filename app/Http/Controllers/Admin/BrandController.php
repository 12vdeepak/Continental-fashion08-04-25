<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandRequest;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brand = Brand::all();
        return view('admin.master-crud.brand.index', compact('brand'));
    }

    public function create()
    {
        return view('admin.master-crud.brand.create');
    }

    public function store(BrandRequest $request)
    {
        // Create a new banner instance
        $brand = new Brand();
        $brand->brand_name = $request->input('brand_name');
        // Handle image upload
        if ($request->hasFile('brand_logo')) {
            $imagePath = $request->file('brand_logo')->store('brand_logos', 'public'); // Store the image in the storage folder
            $brand->brand_logo = $imagePath; // Save the file path to the image attribute
        }

        // Save the Banner instance to the database
        $brand->save();

        // Redirect back to the banners index page
        return redirect()->route('brand.index')->with('message', 'Brand created successfully.');
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.master-crud.brand.edit', compact('brand'));
    }

    public function update(BrandRequest $request, $id)
    {
        $brand = Brand::findOrFail($id);

        // Handle the description update
        $brand->brand_name = $request->input('brand_name');

        if ($request->hasFile('brand_logo')) {
            // Delete the old image if it exists
            if ($brand->brand_logo) {
                Storage::disk('public')->delete($brand->brand_logo);
            }

            // Handle image upload
            $imagePath = $request->file('brand_logo')->store('brand_logos', 'public');
            $brand->brand_logo = $imagePath;
        }

        // Save the updated Banner instance to the database
        $brand->save();

        return redirect()->route('brand.index')->with('message', 'Brand updated successfully.');
    }
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        // Delete the image if it exists
        if ($brand->brand_logo) {
            Storage::disk('public')->delete($brand->brand_logo);
        }

        $brand->delete();
        return redirect()->route('brand.index')->with('message', 'Brand deleted successfully.');
    }
}