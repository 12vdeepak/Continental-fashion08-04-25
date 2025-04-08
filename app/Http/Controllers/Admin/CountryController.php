<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CountryRequest;
use App\Models\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $country = Country::all();
        return view('admin.master-crud.country.index', compact('country'));
    }

    public function create()
    {
        return view('admin.master-crud.country.create');
    }

    public function store(CountryRequest $request)
    {
        // Create a new banner instance
        $country = new Country();
        $country->country_name = $request->input('country_name');


        // Save the Banner instance to the database
        $country->save();

        // Redirect back to the prefix index page
        return redirect()->route('country.index')->with('message', 'Country percentage created successfully.');
    }

    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('admin.master-crud.country.edit', compact('country'));
    }

    public function update(countryRequest $request, $id)
    {
        $country = Country::findOrFail($id);

        // Handle the description update
        $country->country_name = $request->input('country_name');




        // Save the updated Banner instance to the database
        $country->save();

        return redirect()->route('country.index')->with('message', 'Country updated successfully.');
    }
    public function destroy($id)
    {
        $country = Country::findOrFail($id);



        $country->delete();
        return redirect()->route('country.index')->with('message', 'Country  deleted successfully.');
    }


    public function toggleStatus(Country $country)
    {
        $country->update(['status' => !$country->status]); // Toggle the status
        return redirect()->route('country.index')->with('message', 'Country status updated successfully!');
    }
}
