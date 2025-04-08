<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SizeRequest;
use App\Models\Size;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $size = Size::all();
        return view('admin.master-crud.size.index', compact('size'));
    }

    public function create()
    {
        return view('admin.master-crud.size.create');
    }

    public function store(SizeRequest $request)
    {
        // Create a new banner instance
        $size = new Size();
        $size->size_name = $request->input('size_name');


        // Save the Banner instance to the database
        $size->save();

        // Redirect back to the prefix index page
        return redirect()->route('size.index')->with('message', 'Size created successfully.');
    }

    public function edit($id)
    {
        $size = Size::findOrFail($id);
        return view('admin.master-crud.size.edit', compact('size'));
    }

    public function update(SizeRequest $request, $id)
    {
        $size = Size::findOrFail($id);

        // Handle the description update
        $size->size_name = $request->input('size_name');




        // Save the updated Banner instance to the database
        $size->save();

        return redirect()->route('size.index')->with('message', 'Size updated successfully.');
    }
    public function destroy($id)
    {
        $size = Size::findOrFail($id);



        $size->delete();
        return redirect()->route('size.index')->with('message', 'Size deleted successfully.');
    }
}
