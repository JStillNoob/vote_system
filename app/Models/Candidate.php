<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'candidates'; // or 'candidates' if using Laravel naming conventions
    protected $primaryKey = 'candidate_id';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'ElectionPosition_id',
        'bio',
        'is_approve',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function electionPosition()
    {
        return $this->belongsTo(ElectionPosition::class, 'ElectionPosition_id', 'ElectionPosition_id');
    }

    public function votes()
    {
        return $this->hasMany(Vote::class, 'candidate_id', 'candidate_id'); 
    }    


}
