<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use \Staudenmeir\EloquentHasManyDeep\HasTableAlias;
    use HasFactory;
    protected $guarded = [];

    public function trainings()
    {
        return $this->hasMany(Training::class,'course_id','id');
    }








}
