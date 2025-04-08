<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return view('admin.master-crud.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.master-crud.category.create');
    }

    public function store(CategoryRequest $request)
    {
        // Create a new banner instance
        $category = new Category();
        $category->category_name = $request->input('category_name');


        // Save the Banner instance to the database
        $category->save();

        // Redirect back to the prefix index page
        return redirect()->route('category.index')->with('message', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.master-crud.category.edit', compact('category'));
    }

    public function update(categoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);

        // Handle the description update
        $category->category_name = $request->input('category_name');




        // Save the updated Banner instance to the database
        $category->save();

        return redirect()->route('category.index')->with('message', 'Category updated successfully.');
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);



        $category->delete();
        return redirect()->route('category.index')->with('message', 'Category  deleted successfully.');
    }
}
