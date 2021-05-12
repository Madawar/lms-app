<?php

namespace App\Http\Livewire\Course;

use App\Models\Course;
use Livewire\Component;

class CourseCreate extends Component
{
    public $course;
    protected $rules = [
        'course.name' => 'required',
        'course.validity_period' => 'required|numeric',
        'course.validity_period_type' => 'required',
        'course.has_certificate' => 'required',
        'course.grading_type' => 'required',

    ];

    public function mount($course = null)
    {
        if($course){
            $this->course = $course;
        }else{
            $this->course = new Course();
        }
    }

    public function render()
    {
        return view('livewire.course.course-create');
    }

    public function saveEvidence()
    {
        $this->validate();

        $this->course->save();
    }
}
