<?php

namespace App\Http\Controllers;

use App\Models\StudentRegistration;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\User;
use App\Models\Hash;

class StudentRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();

        return view('auth.signup', ['departments' => $departments]);

    }

    public function showAllNeedsApproval()
    {
        // Changed variable name to match what view expects (singular to plural)
        $studentregistrations = StudentRegistration::voters()->get();
        $departments = Department::all();

        
        return view('department-admin.approveVoters', [
            'studentregistrations' => $studentregistrations, 'departments' => $departments
        ]);
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
        
        $validated = $request->validate([
            'student_id' => 'required|numeric|unique:student_registrations,student_id',
            'FirstName' => 'required|string|max:255',
            'MiddleName' => 'nullable|string|max:255',
            'LastName' => 'required|string|max:255',
            'Sex' => 'required|string|in:Male,Female,Other',
            'email' => 'required|email|unique:student_registrations,email',
            'contactNumber' => 'nullable|string|max:20',
            'department_id' => 'nullable|string|max:50',
            'is_registered' => 'sometimes|boolean',
        ]);
    
        
        $student = StudentRegistration::create($validated);
    
        // Return a response
        return redirect()->back()->with([
            'message' => 'Registration Successful!',
            'student' => $student
        ]);
    }

    

    /**
     * Display the specified resource.
     */
    public function show(StudentRegistration $studentRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentRegistration $studentRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentRegistration $studentRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($student_id)
    {
        $studentRegistration = StudentRegistration::where('student_id', $student_id)->firstOrFail();
        $studentRegistration->delete();
    
        return redirect()->back()->with('success', 'Student registration deleted successfully');
    }

    public function approve($student_id)
{
    $student = StudentRegistration::findOrFail($student_id);
    
    $student->update(['is_registered' => true]);



    User::create([
        'FirstName' => $student->FirstName,
        'MiddleName' => $student->MiddleName,
        'LastName' => $student->LastName,
        'Sex' => $student->Sex,
        'email' => $student->email,
        'ContactNumber' => $student->contactNumber,
        'userType_id' => '1',
        'department_id' => $student->department_id,
        'student_id' => $student->student_id,
        'password' => bcrypt('123456'),
    ]);

    

    return redirect()->back()->with('success', 'Student approved successfully');
    
}
}
