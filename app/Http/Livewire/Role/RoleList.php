<?php

namespace App\Http\Livewire\Role;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class RoleList extends Component
{

    use WithPagination;
    public function render()
    {
        $query = Role::query();
         $query = $query->with('courses.course');
        $roles = $query->paginate(10);
        return view('livewire.role.role-list')->with(compact('roles'));
    }
}
