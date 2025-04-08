<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CertificationRequest;
use App\Models\Certification;
use Illuminate\Support\Facades\Storage;

class CertificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certifications = Certification::all();
        return view('admin.master-crud.certification.index', compact('certifications'));
    }

    public function create()
    {
        return view('admin.master-crud.certification.create');
    }

    public function store(CertificationRequest $request)
    {
        // Create a new Certification instance
        $certification = new Certification();
        $certification->certification_name = $request->input('certification_name');

        // Handle image upload
        if ($request->hasFile('certification_logo')) {
            $imagePath = $request->file('certification_logo')->store('certification_logos', 'public');
            $certification->certification_logo = $imagePath;
        }

        // Save the Certification instance to the database
        $certification->save();

        // Redirect back to the index page
        return redirect()->route('certification.index')->with('message', 'Certification created successfully.');
    }

    public function edit($id)
    {
        $certification = Certification::findOrFail($id);
        return view('admin.master-crud.certification.edit', compact('certification'));
    }

    public function update(CertificationRequest $request, $id)
    {
        $certification = Certification::findOrFail($id);

        // Update certification name
        $certification->certification_name = $request->input('certification_name');

        if ($request->hasFile('certification_logo')) {
            // Delete old logo if it exists
            if ($certification->certification_logo) {
                Storage::disk('public')->delete($certification->certification_logo);
            }

            // Upload new image
            $imagePath = $request->file('certification_logo')->store('certification_logos', 'public');
            $certification->certification_logo = $imagePath;
        }

        // Save the updated certification to the database
        $certification->save();

        return redirect()->route('certification.index')->with('message', 'Certification updated successfully.');
    }

    public function destroy($id)
    {
        $certification = Certification::findOrFail($id);

        // Delete the logo if it exists
        if ($certification->certification_logo) {
            Storage::disk('public')->delete($certification->certification_logo);
        }

        $certification->delete();
        return redirect()->route('certification.index')->with('message', 'Certification deleted successfully.');
    }
}
