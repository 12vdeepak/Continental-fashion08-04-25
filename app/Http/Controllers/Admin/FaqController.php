<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqRequest;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.master-crud.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new FAQ.
     */
    public function create()
    {
        return view('admin.master-crud.faq.create');
    }

    /**
     * Store a newly created FAQ in storage.
     */
    public function store(FaqRequest $request)
    {
        // Create a new FAQ instance
        $faq = new Faq();
        $faq->question = $request->input('question');
        $faq->answer = $request->input('answer');

        // Save to the database
        $faq->save();

        return redirect()->route('faq.index')->with('message', 'FAQ created successfully.');
    }

    /**
     * Show the form for editing the specified FAQ.
     */
    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.master-crud.faq.edit', compact('faq'));
    }

    /**
     * Update the specified FAQ in storage.
     */
    public function update(FaqRequest $request, $id)
    {
        $faq = Faq::findOrFail($id);

        // Update question and answer
        $faq->question = $request->input('question');
        $faq->answer = $request->input('answer');

        // Save changes to the database
        $faq->save();

        return redirect()->route('faq.index')->with('message', 'FAQ updated successfully.');
    }

    /**
     * Remove the specified FAQ from storage.
     */
    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);

        // Delete the record
        $faq->delete();

        return redirect()->route('faq.index')->with('message', 'FAQ deleted successfully.');
    }

    /**
     * Toggle the status of the FAQ.
     */
    public function toggleStatus(Faq $faq)
    {
        // Toggle the status (0 = inactive, 1 = active)
        $faq->status = $faq->status == 0 ? 1 : 0;
        $faq->save();

        return redirect()->route('faq.index')->with('message', 'FAQ status updated successfully!');
    }
}
