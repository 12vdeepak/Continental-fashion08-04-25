<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $color = Color::all();
        return view('admin.master-crud.colors.index', compact('color'));
    }

    public function create()
    {
        return view('admin.master-crud.colors.create');
    }

    public function store(ColorRequest $request)
    {
        // Create a new banner instance
        $color = new Color();
        $color->color_code = $request->input('color_code');
        // Handle image upload

        // Save the Banner instance to the database
        $color->save();

        // Redirect back to the banners index page
        return redirect()->route('colors.index')->with('message', 'Color created successfully.');
    }

    public function edit($id)
    {
        $color = Color::findOrFail($id);
        return view('admin.master-crud.colors.edit', compact('color'));
    }

    public function update(ColorRequest $request, $id)
    {
        $color = Color::findOrFail($id);

        // Update color code
        $color->color_code = $request->input('color_code');



        // Save changes
        $color->save();

        return redirect()->route('colors.index')->with('message', 'Color updated successfully.');
    }

    public function destroy($id)
    {
        $color = Color::findOrFail($id);



        $color->delete();
        return redirect()->route('colors.index')->with('message', 'Color deleted successfully.');
    }
}
