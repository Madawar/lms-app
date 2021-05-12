<?php

namespace App\Http\Livewire\Staff;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class StaffCreate extends Component
{
    public $staff;

    protected $rules = [
        'staff.name' => 'required',
        'staff.email' => 'required',
        'staff.role_id' => 'required',



    ];

    public function mount($staff = null)
    {
        if ($staff) {
            $this->staff= $staff;
        } else {
            $this->staff = new User();
        }
    }
    public function saveUser()
    {
        $this->validate();
        $this->staff->save();
    }

    public function render()
    {
        $roles = Role::all()->pluck('name','id');
        return view('livewire.staff.staff-create')->with(compact('roles'));
    }
}
