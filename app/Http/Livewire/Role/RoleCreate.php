<?php

namespace App\Http\Livewire\Role;

use App\Models\Course;
use App\Models\Role;
use App\Models\RoleRequirement;
use Livewire\Component;

class RoleCreate extends Component
{
    public $role;
    public $course;
    protected $rules = [
        'role.name' => 'required',
        'course' => '',


    ];

    public function mount($role = null)
    {
        if ($role) {
            $this->role = $role;
        } else {
            $this->role = new Role();
        }
    }

    public function saveRole()
    {
        $this->validate();
        $this->role->save();
    }

    public function addRequirement($id)
    {
        $course = new RoleRequirement(['role_id' => $this->role->id, 'course_id' => $id]);

        $this->role->courses()->save($course);
        $this->role = Role::with('courses.course')->find($this->role->id);

    }

    public function render()
    {
        $courses = Course::all()->pluck('name', 'id');
        return view('livewire.role.role-create')->with(compact('courses'));
    }
}
