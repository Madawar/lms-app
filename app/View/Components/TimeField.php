<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class TimeField extends Component
{
    public $course_id;
    public $user_id;
    public $data;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($course, $user)
    {

        $this->course_id = $course;
        $this->user_id = $user;
        $this->data = User::with([
            'courses' => function ($query) use ($course) {
                $query->with('training')->where('course_id', $course);
            },
        ])->whereHas('courses', function (Builder $query) use ($course) {
            $query->where('course_id', $course);
        })->find($user);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data = $this->data;
        if (isset($data->courses)) {
            $data = $data->courses->first();

        }else{
            $data = null;
        };
        return view('components.time-field')->with(compact('data'));
    }
}
