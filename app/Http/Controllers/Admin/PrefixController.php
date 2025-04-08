<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PrefixRequest;
use App\Models\Prefix;


class PrefixController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prefix = Prefix::all();
        return view('admin.master-crud.prefix.index', compact('prefix'));
    }

    public function create()
    {
        return view('admin.master-crud.prefix.create');
    }

    public function store(PrefixRequest $request)
    {
        // Create a new banner instance
        $prefix = new Prefix();
        $prefix->name = $request->input('name');


        // Save the Banner instance to the database
        $prefix->save();

        // Redirect back to the prefix index page
        return redirect()->route('prefix.index')->with('message', 'Prefix created successfully.');
    }

    public function edit($id)
    {
        $prefix = Prefix::findOrFail($id);
        return view('admin.master-crud.prefix.edit', compact('prefix'));
    }

    public function update(PrefixRequest $request, $id)
    {
        $prefix = Prefix::findOrFail($id);

        // Handle the description update
        $prefix->name = $request->input('name');




        // Save the updated Banner instance to the database
        $prefix->save();

        return redirect()->route('prefix.index')->with('message', 'Prefix updated successfully.');
    }
    public function destroy($id)
    {
        $prefix = Prefix::findOrFail($id);



        $prefix->delete();
        return redirect()->route('prefix.index')->with('message', 'Prefix deleted successfully.');
    }
}
