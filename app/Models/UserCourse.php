<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCourse extends Model
{
    use HasFactory;
    protected $guarded = [

    ];

    public function training()
    {
        return $this->hasOne(Training::class,'id','training_id');
    }


    public function trainings()
    {
        return $this->hasMany(Training::class,'id','training_id');
    }

    public function course()
    {
        return $this->hasOne(Course::class, 'id', 'course_id');
    }
}
