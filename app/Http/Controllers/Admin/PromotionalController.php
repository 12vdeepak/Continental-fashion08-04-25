<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PromotionalRequest;
use App\Models\Promotional;

class PromotionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotionals = Promotional::all();
        return view('admin.master-crud.promotional.index', compact('promotionals'));
    }

    public function create()
    {
        return view('admin.master-crud.promotional.create');
    }

    public function store(PromotionalRequest $request)
    {
        // Create a new Promotional instance
        $promotional = new Promotional();
        $promotional->promotional_name = $request->input('promotional_name');

        // Save to the database
        $promotional->save();

        // Redirect back to the index page
        return redirect()->route('promotional.index')->with('message', 'Promotional item created successfully.');
    }

    public function edit($id)
    {
        $promotional = Promotional::findOrFail($id);
        return view('admin.master-crud.promotional.edit', compact('promotional'));
    }

    public function update(PromotionalRequest $request, $id)
    {
        $promotional = Promotional::findOrFail($id);

        // Update promotional_name
        $promotional->promotional_name = $request->input('promotional_name');

        // Save changes to the database
        $promotional->save();

        return redirect()->route('promotional.index')->with('message', 'Promotional item updated successfully.');
    }

    public function destroy($id)
    {
        $promotional = Promotional::findOrFail($id);

        // Delete the record
        $promotional->delete();

        return redirect()->route('promotional.index')->with('message', 'Promotional item deleted successfully.');
    }
}
