<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DimensionRequest;
use App\Models\Dimension;
use Illuminate\Http\Request;

class DimensionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dimensions = Dimension::all();
        return view('admin.master-crud.dimension.index', compact('dimensions'));
    }

    public function create()
    {
        return view('admin.master-crud.dimension.create');
    }

    public function store(DimensionRequest $request)
    {
        $dimension = new Dimension();
        $dimension->dimension_name = $request->input('dimension_name');
        $dimension->save();

        return redirect()->route('dimension.index')->with('message', 'Dimension created successfully.');
    }

    public function edit($id)
    {
        $dimension = Dimension::findOrFail($id);
        return view('admin.master-crud.dimension.edit', compact('dimension'));
    }

    public function update(DimensionRequest $request, $id)
    {
        $dimension = Dimension::findOrFail($id);
        $dimension->dimension_name = $request->input('dimension_name');
        $dimension->save();

        return redirect()->route('dimension.index')->with('message', 'Dimension updated successfully.');
    }

    public function destroy($id)
    {
        $dimension = Dimension::findOrFail($id);
        $dimension->delete();

        return redirect()->route('dimension.index')->with('message', 'Dimension deleted successfully.');
    }
}
