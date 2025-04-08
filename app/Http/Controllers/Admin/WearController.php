<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WearRequest;
use App\Models\Wear;
use Illuminate\Http\Request;

class WearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wears = Wear::all();
        return view('admin.master-crud.wear.index', compact('wears'));
    }

    public function create()
    {
        return view('admin.master-crud.wear.create');
    }

    public function store(WearRequest $request)
    {
        // Create a new Wear instance
        $wear = new Wear();
        $wear->wear_name = $request->input('wear_name');

        // Save to the database
        $wear->save();

        // Redirect back to the index page
        return redirect()->route('wear.index')->with('message', 'Wear created successfully.');
    }

    public function edit($id)
    {
        $wear = Wear::findOrFail($id);
        return view('admin.master-crud.wear.edit', compact('wear'));
    }

    public function update(WearRequest $request, $id)
    {
        $wear = Wear::findOrFail($id);

        // Update wear_name
        $wear->wear_name = $request->input('wear_name');

        // Save changes to the database
        $wear->save();

        return redirect()->route('wear.index')->with('message', 'Wear updated successfully.');
    }

    public function destroy($id)
    {
        $wear = Wear::findOrFail($id);

        // Delete the record
        $wear->delete();

        return redirect()->route('wear.index')->with('message', 'Wear deleted successfully.');
    }

}
