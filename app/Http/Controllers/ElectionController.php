<?php

namespace App\Http\Controllers;

use App\Models\Election;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\ElectionPosition;
use App\Models\Position;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $elections = Election::with(['department'])->get();
        $departments = Department::all();

       
    
        return view('department-admin.elections', compact('elections', 'departments'));
        // Fixed the typo in the variable name
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
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'start_date' => 'required|date|after_or_equal:now',
        'end_date' => 'required|date|after:start_date',
        'department_id' => 'required|exists:departments,department_id',
       
    ]);
    

    try {
        Election::create([
            'title' => $validatedData['title'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'department_id' => $validatedData['department_id'],
            
        ]);

        return redirect()->route('view-election')
                       ->with('success', 'Election created successfully!');

    } catch (\Exception $e) {
        \Log::error('Election creation failed: ' . $e->getMessage());
        return redirect()->back()
                       ->withInput()
                       ->with('error', 'Failed to create election. Please try again.');
    }
}

    /**
     * Display the specified resource.
     */
    public function show(Election $elections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Election $elections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Election $elections)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Election $elections)
    {
        
    }

    public function manageElection($election_id)
    {
        // Load the election with its positions
        $elections = Election::with(['election_positions.position'])->findOrFail($election_id);
        
        // If you still need all election positions separately (you might not need this)
        $electionPositions = ElectionPosition::with('position')
                              ->where('election_id', $election_id)
                              ->get();
        $positions = Position::all();
        
        return view('department-admin.manageElection', compact('elections', 'electionPositions', 'positions'));
    }

    public function showElectionByDepartment()
    {
      
        $user = auth()->user()->load('department');
        
       
        $elections = Election::where('department_id', $user->department_id)
            ->with('department') 
            ->get();
        
        return view('voter.election', compact('elections', 'users'));
    }
}
