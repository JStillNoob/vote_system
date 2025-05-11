<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'positions'; 
    protected $primaryKey = 'position_id';
    public $timestamps = true;

    protected $fillable = [
        'position_id',
        'title',

    ];

    

}
