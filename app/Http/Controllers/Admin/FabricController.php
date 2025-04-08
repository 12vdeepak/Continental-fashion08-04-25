<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FabricRequest;
use App\Models\Fabric;

class FabricController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fabrics = Fabric::all();
        return view('admin.master-crud.fabric.index', compact('fabrics'));
    }

    public function create()
    {
        return view('admin.master-crud.fabric.create');
    }

    public function store(FabricRequest $request)
    {
        // Create a new Fabric instance
        $fabric = new Fabric();
        $fabric->fabric_name = $request->input('fabric_name');

        // Save to the database
        $fabric->save();

        // Redirect back to the index page
        return redirect()->route('fabric.index')->with('message', 'Fabric created successfully.');
    }

    public function edit($id)
    {
        $fabric = Fabric::findOrFail($id);
        return view('admin.master-crud.fabric.edit', compact('fabric'));
    }

    public function update(FabricRequest $request, $id)
    {
        $fabric = Fabric::findOrFail($id);

        // Update fabric_name
        $fabric->fabric_name = $request->input('fabric_name');

        // Save changes to the database
        $fabric->save();

        return redirect()->route('fabric.index')->with('message', 'Fabric updated successfully.');
    }

    public function destroy($id)
    {
        $fabric = Fabric::findOrFail($id);

        // Delete the record
        $fabric->delete();

        return redirect()->route('fabric.index')->with('message', 'Fabric deleted successfully.');
    }
}
