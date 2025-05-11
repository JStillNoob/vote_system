<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'FirstName',
        'MiddleName',
        'LastName',
        'Sex',
        'ContactNumber',
        'email',
        'password',
        'userType_id',
        'department_id',
        'student_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }
    

    public function userType()
    {
        return $this->belongsTo(UserType::class, 'userType_id', 'userType_id');
    }

    public function getFullNameAttribute()
    {
       
        $fullName = $this->FirstName . ' ' . $this->MiddleName . ' ' . $this->LastName;

        
        return $fullName ?: 'N/A'; 
    }

    public function scopeVoters($query)
    {
        return $query->whereHas('userType', function($q) {
            $q->where('userType_name', 'Voter');
        });
    }

    public function StudentRegistration()
    {
        return $this->belongsTo(StudentRegistration::class, 'student_id', 'student_id');
    }
    

}
