<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'voter_id',
        'election_position_id',
        'candidate_id',
    ];

    // Relationships

    public function voter()
    {
        return $this->belongsTo(User::class, 'voter_id', 'user_id');
    }

    public function electionPosition()
    {
        return $this->belongsTo(ElectionPosition::class, 'election_id', 'election_id');
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id', 'candidate_id');
    }
}