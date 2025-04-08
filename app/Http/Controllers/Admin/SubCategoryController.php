<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;


class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all subcategories with category details
        $subcategories = Subcategory::with('category')->get();
        return view('admin.master-crud.subcategory.index', compact('subcategories'));
    }

    public function create()
    {
        // Fetch all categories for the dropdown in the form
        $categories = Category::all();
        return view('admin.master-crud.subcategory.create', compact('categories'));
    }

    public function store(SubcategoryRequest $request)
    {
        // Create a new subcategory
        Subcategory::create($request->validated());

        return redirect()->route('subcategory.index')->with('message', 'Subcategory created successfully.');
    }

    public function edit($id)
    {
        // Find the subcategory and fetch categories for dropdown
        $subcategory = Subcategory::findOrFail($id);
        $categories = Category::all();

        return view('admin.master-crud.subcategory.edit', compact('subcategory', 'categories'));
    }

    public function update(SubCategoryRequest $request, $id)
    {
        // Find the subcategory and update it
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->update($request->validated());

        return redirect()->route('subcategory.index')->with('message', 'Subcategory updated successfully.');
    }

    public function destroy($id)
    {
        // Find and delete the subcategory
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();

        return redirect()->route('subcategory.index')->with('message', 'Subcategory deleted successfully.');
    }
}
