<?php

namespace App\Http\Livewire\Staff;

use App\Models\Course;
use App\Models\Training;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;
use DB;


class StaffList extends Component
{
    use WithPagination;
    public $trainings;
    public $filter;
    public function render()
    {

        $query = User::query();

        $query->when($this->filter == 'missing', function ($q) {
            return $q->whereHas('courses', function (Builder $query) {
                $query->whereNull('done_on')->where('course_id', $this->trainings);
            });
        });
        $query->when($this->filter == 'valid', function ($q) {
            return $q->whereHas('courses', function (Builder $query) {
                $query->whereNotNull('done_on')->where('date_of_expiry', '>=', Carbon::today()->startOfDay())->where('course_id', $this->trainings);
            });
        });
        $query->when($this->filter == 'expired', function ($q) {
            return $q->whereHas('courses', function (Builder $query) {

                $query->where('date_of_expiry', '<=', Carbon::today()->startOfDay())->where('course_id', $this->trainings);
            });
        });
        $query->when($this->trainings, function ($q, $id) {
            return $q->whereHas('courses', function (Builder $query) use ($id) {
                $query->where('course_id', $id);
            });
        });



        $users = $query->paginate(10);
        //   dd($users);
        $courses = Course::all()->pluck('name', 'id');
        $courses->prepend('Pick A Course', '');
        //  dd($trainings);
        return view('livewire.staff.staff-list')->with(compact('users', 'courses'));
    }

    public function peformSearch()
    {
        return User::join('role_requirements', 'role_requirements.role_id', '=', 'users.role_id')
            ->join('courses', 'role_requirements.course_id', '=', 'courses.id')
            //  ->leftJoin('trainings', 'trainings.course_id', '=', 'role_requirements.course_id')
            ->leftJoin('trainings', function ($join) {
                $join->on('trainings.course_id', '=', 'role_requirements.course_id');
                $join->on('trainings.user_id', '=', 'users.id');
            })
            ->select('users.id', 'users.name', 'courses.id as course_id', 'courses.name as course_name', 'trainings.date_done', 'trainings.date_of_expiry')
            // ->where('courses.name','Baggage Claims and Proration')
            //->where('role_requirements.role_id',4)
            // ->whereNull('trainings.course_id')
            // ->where('trainings.date_of_expiry','<=', Carbon::today()->startOfDay())
            ->get();
    }
}
