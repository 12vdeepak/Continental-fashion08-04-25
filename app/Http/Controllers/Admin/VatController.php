<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VatsRequest;
use App\Models\Vat;
use App\Models\Country;


class VatController extends Controller
{
    /**
     * Display a listing of the VATs.
     */
    public function index()
    {
        $vats = Vat::with('country')->get();
        return view('admin.master-crud.vat.index', compact('vats'));
    }

    /**
     * Show the form for creating a new VAT.
     */
    public function create()
    {
        $countries = Country::where('status', 1)->get();
        return view('admin.master-crud.vat.create', compact('countries'));
    }

    /**
     * Store a newly created VAT in storage.
     */
    public function store(VatsRequest $request)
    {
        Vat::create($request->validated());

        return redirect()->route('vat.index')->with('message', 'VAT added successfully!');
    }

    /**
     * Show the form for editing the specified VAT.
     */
    public function edit(Vat $vat)
    {
        $countries = Country::all();
        return view('admin.master-crud.vat.edit', compact('vat', 'countries'));
    }

    /**
     * Update the specified VAT in storage.
     */
    public function update(VatsRequest $request, Vat $vat)
    {
        $vat->update($request->validated());

        return redirect()->route('vat.index')->with('message', 'VAT updated successfully!');
    }

    /**
     * Remove the specified VAT from storage.
     */
    public function destroy(Vat $vat)
    {
        $vat->delete();
        return redirect()->route('vat.index')->with('message', 'VAT deleted successfully!');
    }
}
