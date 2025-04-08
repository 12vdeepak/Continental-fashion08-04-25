<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MaterialRequest;
use App\Models\Material;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = Material::all();
        return view('admin.master-crud.material.index', compact('materials'));
    }

    public function create()
    {
        return view('admin.master-crud.material.create');
    }

    public function store(MaterialRequest $request)
    {
        // Create a new Material instance
        $material = new Material();
        $material->material_name = $request->input('material_name');

        // Save to the database
        $material->save();

        // Redirect back to the index page
        return redirect()->route('material.index')->with('message', 'Material created successfully.');
    }

    public function edit($id)
    {
        $material = Material::findOrFail($id);
        return view('admin.master-crud.material.edit', compact('material'));
    }

    public function update(MaterialRequest $request, $id)
    {
        $material = Material::findOrFail($id);

        // Update material_name
        $material->material_name = $request->input('material_name');

        // Save changes to the database
        $material->save();

        return redirect()->route('material.index')->with('message', 'Material updated successfully.');
    }

    public function destroy($id)
    {
        $material = Material::findOrFail($id);

        // Delete the record
        $material->delete();

        return redirect()->route('material.index')->with('message', 'Material deleted successfully.');
    }
}
