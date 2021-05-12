<?php

namespace App\Http\Livewire\Staff;

use App\Models\Course;
use App\Models\Training;
use App\Models\User;
use App\Models\UserCourse;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadTraining extends Component
{
    use WithFileUploads;
    public $training;
    public $course_name;
    public $course_id;
    public $uploadFile;

    protected $rules = [
        'training.course_id' => 'required',
        'training.user_id' => 'required',
        'training.done_on' => 'required',
        'training.attachments' => '',
        'training.grade' => '',
        'uploadFile' => ''
    ];

    public function mount($training = null)
    {
        if ($training) {
            $this->training = $training;
        } else {
            $this->training = new Training();
        }
        $this->course_name = $this->training->course_name;
        $this->course_id = $this->training->course_id;
    }

    public function saveTraining()
    {

        $this->validate();
        $file =  $this->uploadFile->store('certificates');
        $user = User::find( $this->training->user_id);
        $user->addMedia(storage_path('app/'.$file))
        ->withCustomProperties(['course' => $this->course_name,'course_id'=>$this->course_id])
        ->toMediaCollection('certificates');
        $course = Course::find($this->training->course_id);
        $this->training->date_of_expiry =  Carbon::parse($this->training->done_on)->addMonth($course->validity_period);
        $user = User::find($this->training->user_id);
        $this->training->save();
        UserCourse::where('user_id', $this->training->user_id)->where('course_id', $this->course_id)->update(['training_id' => $this->training->id, 'done_on' => $this->training->done_on, 'date_of_expiry' => $this->training->date_of_expiry]);
    }




    public function render()
    {
        return view('livewire.staff.upload-training');
    }
}
