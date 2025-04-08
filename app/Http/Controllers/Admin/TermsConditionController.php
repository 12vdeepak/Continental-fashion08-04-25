<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateTermsConditionRequest;
use App\Models\TermsCondition;
use Illuminate\Http\Request;

class TermsConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $termscondition = TermsCondition::first();
        return view('admin.terms-condition.index', compact('termscondition'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, TermsCondition $termscondition)
    {
        return view('admin.terms-condition.edit', compact('termscondition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTermsConditionRequest $request, TermsCondition $termscondition)
    {
        $termscondition->description = $request->description;
        $termscondition->save();

        return redirect()->route('termscondition.index')->with('message', 'Terms & Conditions updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
