<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElectionPosition extends Model
{
    protected $table = 'election_positions';
    protected $primaryKey = 'ElectionPosition_id';
    public $timestamps = true;

    protected $fillable = [
        'election_id',
        'position_id',
        'description'
    ];

    public function election()
    {
        return $this->belongsTo(Election::class, 'election_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class, 'ElectionPosition_id');
    }
}