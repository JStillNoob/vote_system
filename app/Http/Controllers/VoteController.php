<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Election;
use App\Models\ElectionPosition;
use App\Models\Candidate;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function showElectionForm($electionId)
    {
        $election = Election::with(['election_positions.position', 'election_positions.candidates.user'])
            ->findOrFail($electionId);
       // dd($election);

        return view('voter.vote-form', compact('election'));
    }

    public function submitVote(Request $request)
    {
        $userId = Auth::id();
        $electionId = $request->input('election_id');

        foreach ($request->input('votes') as $electionPositionId => $candidateId) {
            Vote::updateOrCreate(
                [
                    'voter_id' => $userId,
                    'election_position_id' => $electionPositionId
                ],
                [
                    'candidate_id' => $candidateId
                ]
            );
        }

        return redirect()->route('election')->with('success', 'Your votes have been submitted.');
    }

    public function showResults($electionId)
    {
        $election = Election::findOrFail($electionId);
    
        $positions = ElectionPosition::with([
            'candidates.user',
            'candidates' => function ($query) {
                $query->withCount('votes')->orderByDesc('votes_count');
            }
        ])->where('election_id', $electionId)->get();
    
        return view('department-admin.view-result', compact('positions', 'election'));
    }

    public function showElectionsList()
    {
        $userId = Auth::id();
        $elections = Election::with('department')
            ->get()
            ->map(function ($election) use ($userId) {
                // Check if user has voted in this election
                $hasVoted = Vote::whereHas('electionPosition', function ($query) use ($election) {
                    $query->where('election_positions.election_id', $election->election_id);
                })->where('voter_id', $userId)->exists();
                
                $election->has_voted = $hasVoted;
                return $election;
            });

        return view('voter.election', compact('elections'));
    }
}