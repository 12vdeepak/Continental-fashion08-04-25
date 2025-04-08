<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DepartmentRequest;
use App\Models\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $department = Department::all();
        return view('admin.master-crud.department.index', compact('department'));
    }

    public function create()
    {
        return view('admin.master-crud.department.create');
    }

    public function store(DepartmentRequest $request)
    {
        // Create a new banner instance
        $department = new Department();
        $department->department_name = $request->input('department_name');


        // Save the Banner instance to the database
        $department->save();

        // Redirect back to the prefix index page
        return redirect()->route('department.index')->with('message', 'Department created successfully.');
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('admin.master-crud.department.edit', compact('department'));
    }

    public function update(departmentRequest $request, $id)
    {
        $department = Department::findOrFail($id);

        // Handle the description update
        $department->department_name = $request->input('department_name');




        // Save the updated Banner instance to the database
        $department->save();

        return redirect()->route('department.index')->with('message', 'Department updated successfully.');
    }
    public function destroy($id)
    {
        $department = Department::findOrFail($id);



        $department->delete();
        return redirect()->route('department.index')->with('message', 'Department  deleted successfully.');
    }
}
