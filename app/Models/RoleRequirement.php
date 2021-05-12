<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleRequirement extends Model
{
    use HasFactory;
    protected $guarded = [

    ];

    /**
     * Get the phone associated with the user.
     */
    public function course()
    {
        return $this->hasOne(Course::class,'id','course_id');
    }
    public function trainings()
    {
        return $this->hasMany(Training::class,'course_id','course_id');
    }
    public function lastTraining()
    {
        return $this->hasOne(Training::class,'course_id','course_id')->orderBy('date_done','DESC');
    }
}
