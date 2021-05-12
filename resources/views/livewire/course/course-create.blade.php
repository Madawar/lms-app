<div class="p-2">
    <x-forms.input label="Course Name" placeholder="Course Name" name="course.name" />

    <div class="flex flex-col md:flex-row md:space-x-2">
        <div class="flex-auto">
            <x-forms.input label="Validity Period" placeholder="Validity Period" name="course.validity_period" />
        </div>
        <div class="flex-auto">
            <x-forms.select label="Validity Period Duration" placeholder="Validity Period Duration "
                name="course.validity_period_type"
                :options="array('months'=>'Months','days'=>'Days','years'=>'Years')" />
        </div>
    </div>
    <div class="flex flex-col md:flex-row md:space-x-2">
        <div class="flex-auto">
            <x-forms.select label="Has Certificate" placeholder="Has Certificate " name="course.has_certificate"
                :options="array(1=>'Yes',0=>'No')" />
        </div>
        <div class="flex-auto">
            <x-forms.select label="Grading Type" placeholder="Grading Type " name="course.grading_type" :options="array('percentage'=>'Percentage Grading','pass'=>'Pass/Fail','letter'=>'From A to F')" />
        </div>
    </div>

    <div class="flex justify-center mt-2 mb-1">
        <button class="btn btn-primary btn-active " role="button" wire:click="saveEvidence">Save
            Course</button>
    </div>


</div>
