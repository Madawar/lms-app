<?php

namespace App\Http\Livewire\Course;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CourseList extends Component
{
    use WithPagination;
    public function render()
    {
        $query = Course::query();

       // $query = $query->with('AuditItems');



            $courses = $query->paginate(10);

        return view('livewire.course.course-list')->with(compact('courses'));
    }
}
