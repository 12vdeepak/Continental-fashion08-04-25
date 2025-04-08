<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WeightRequest;
use App\Models\Weight;
use Illuminate\Http\Request;

class WeightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $weight = Weight::all();
        return view('admin.master-crud.weight.index', compact('weight'));
    }

    public function create()
    {
        return view('admin.master-crud.weight.create');
    }

    public function store(WeightRequest $request)
    {
        // Create a new banner instance
        $weight = new Weight();
        $weight->weight_name = $request->input('weight_name');


        // Save the Banner instance to the database
        $weight->save();

        // Redirect back to the prefix index page
        return redirect()->route('weight.index')->with('message', 'Weight created successfully.');
    }

    public function edit($id)
    {
        $weight = Weight::findOrFail($id);
        return view('admin.master-crud.weight.edit', compact('weight'));
    }

    public function update(WeightRequest $request, $id)
    {
        $weight = Weight::findOrFail($id);

        // Handle the description update
        $weight->weight_name = $request->input('weight_name');




        // Save the updated Banner instance to the database
        $weight->save();

        return redirect()->route('weight.index')->with('message', 'Weight updated successfully.');
    }
    public function destroy($id)
    {
        $weight = Weight::findOrFail($id);



        $weight->delete();
        return redirect()->route('weight.index')->with('message', 'Weight deleted successfully.');
    }
}
