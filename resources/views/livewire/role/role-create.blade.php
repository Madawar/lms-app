<div class="p-2">


    <div class="flex flex-col md:flex-row md:space-x-2">
        <div class="w-9/12">
            <x-forms.input label="Name" placeholder="Name" name="role.name" />
        </div>
        <div class="w-3/12">
            <label class="label">
                <span class="label-text">Add</span>
            </label>
            <button class="btn btn-primary btn-active " role="button" wire:click="saveRole">Save Role</button>
        </div>
    </div>


    <div class=" border m-3">
        <div class="flex flex-col md:flex-row md:space-x-2 p-2">
            <div class="w-9/12">
                <x-forms.select label="Course" placeholder="Choose A Course" name="course" :options="$courses" />
            </div>
            <div class="w-3/12">
                <label class="label">
                    <span class="label-text">Add {{$course}}</span>
                </label>
                <button class="btn btn-primary btn-active " role="button"
                    wire:click="addRequirement({{ $course }})">Add Requirement</button>
            </div>

        </div>
        <hr />
        <table class="table-auto w-full border-collapse ">
            <thead class="">
                <th
                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Course</th>
                <th
                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Trainings Required</th>



                </tr>
            </thead>
            <tbody>
                @foreach ($role->courses as $course)

                    <tr
                        class="bg-white  lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                            <span
                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Role
                                Name</span>
                                {{$course->course->name}}

                        </td>
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                            <span
                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Trainings
                                Required</span>

                        </td>


                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>


</div>
