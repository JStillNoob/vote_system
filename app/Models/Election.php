<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    protected $table = 'elections'; 
    protected $primaryKey = 'election_id';
    public $timestamps = true;
    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'is_active',
        'department_id',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }
    
    public function positions(){
        return $this->hasMany(Position::class,'election_id');

    }

    public function election_positions()
    {
        return $this->hasMany(ElectionPosition::class, 'election_id', 'election_id');
    }



    


    
}
