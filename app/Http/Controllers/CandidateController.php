<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Models\ElectionPosition;
use App\Models\Election;
use App\Models\User;
use App\Models\Position;
class CandidateController extends Controller
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
    public function store(Request $request, $electionPositionId)
    {
        $request->validate([
            'bio' => 'required|string|max:1000',
        ]);
    
        $user = $request->user();
    
        Candidate::create([
            'user_id' => $user->id,
            'ElectionPosition_id' => $electionPositionId,
            'bio' => $request->bio,
            'is_approve' => false,
        ]);
    
        return redirect()->back()->with('success', 'Application submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        //
    }

    public function showElections(Request $request)
    {
        $user = $request->user();
        
        // Get elections that match the user's department
        $elections = Election::where('department_id', $user->department_id)
            ->with('election_positions.position') 
            ->get();
        
        return view('voter.manageAcc', [
            'elections' => $elections,
            'user' => $user
        ]);
    }

    public function manageCandidacy($election_id)
    {
        // Load the election with its positions
        $election = Election::with(['election_positions.position'])
                     ->findOrFail($election_id);
        
        return view('voter.applyforCandidate', [
            'election' => $election,
            'electionPositions' => $election->election_positions
        ]);
    }
    
    public function candidatesByPosition(Request $request)
    {
        $positionId = $request->get('election_position_id');
    
        // Find the ElectionPosition record first
        $electionPosition = ElectionPosition::with('position', 'election')->find($positionId);
    
        if (!$electionPosition) {
            return redirect()->back()->with('error', 'Position not found.');
        }
    
        // Get the parent election
        $elections = $electionPosition->election;
    
        // Get all election positions for the sidebar
        $electionPositions = $elections->election_positions()->with('position')->get();
    
        // Get all positions for the modal dropdown
        $positions = Position::all();
    
        // Get candidates for the selected election position
        $candidates = Candidate::with('user')
            ->where('ElectionPosition_id', $positionId)
            ->get();
    
        return view('department-admin.manageElection', [
            'candidates' => $candidates,
            'elections' => $elections,
            'positions' => $positions,
            'electionPositions' => $electionPositions, // pass this for the sidebar list
            'selectedPositionId' => $positionId, // optionally use to highlight selected position
        ]);
    }

    public function approve($id)
    {
        $candidate = Candidate::findOrFail($id);
        $candidate->is_approve = 1;
        $candidate->save();

        return redirect()->back()->with('success', 'Candidate approved successfully.');
    }

    public function disapprove($id)
    {
        $candidate = Candidate::findOrFail($id);
        $candidate->is_approve = 0;
        $candidate->save();

        return redirect()->back()->with('success', 'Candidate disapproved successfully.');
    }

    public function showElectionsList(Request $request)
    {
        $user = $request->user();
        
        
        $elections = Election::where('department_id', $user->department_id)
            ->with('election_positions.position') 
            ->get();
        
        return view('voter.election', [
            'elections' => $elections,
            'user' => $user
        ]);
    }
    
}
