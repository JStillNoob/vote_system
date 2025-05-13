<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */public function index()
{
    $departments = Department::all();
    return view('admin.index', ['departments' => $departments]); 
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
        $request->validate([
            'department_name' => 'required|string|max:255|unique:departments',
        ]);

        Department::create([
            'department_name' => $request->department_name,
        ]);

        return redirect()->back()->with('success', 'Department created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($department_id)
    {
        //
         // Find the post by ID
         $departments = Department::findOrFail($department_id);

         // Return the view with the post data
         
         return view('admin.show', data: compact('departments'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($department_id)
    {
                 // Find the post by ID
                 $departments = Department::findOrFail($department_id);

                 // Return the view with the post data
                 
                 return view('admin.edit', data: compact('departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $department_id)
    {
        $request->validate([
            'department_name' => 'required|string|max:255',
        ]);

        $department = Department::findOrFail($department_id);
        $department->update([
            'department_name' => $request->department_name,
        ]);

        return redirect()->route('departments.index')->with('success', 'Department updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
        $department = Department::findOrFail($id);
        $department->delete();

        
        return redirect()->back()->with('success', 'Department deleted successfully!'); 
    }
}
