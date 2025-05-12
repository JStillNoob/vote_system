<?php

namespace App\Http\Controllers;

use App\Models\ElectionPosition;
use Illuminate\Http\Request;
use App\Models\Election;

class ElectionPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, $election_id)
    {
        $request->validate([
           'position_id' => 'required|numeric|exists:positions,position_id',
           'description' => 'required|string|max:255',
        ]);
    
        ElectionPosition::create([
            'election_id' => $election_id, // Use the parameter from route
            'position_id' => $request->position_id,
            'description' => $request->description,
        ]);
    
        return redirect()->back()->with('success', 'Election position created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ElectionPosition $electionPosition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ElectionPosition $electionPosition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ElectionPosition $electionPosition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ElectionPosition $electionPosition)
    {
        //
    }

}
