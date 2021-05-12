<div>
    <table class="table-auto w-full border-collapse ">
        <thead class="">
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                Role</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                Trainings Required</th>



            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)

                <tr
                    class="bg-white  lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span
                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Role Name</span>
                        {{ $role->name }}
                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-justify border border-b block lg:table-cell relative lg:static">
                        <span
                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Trainings Required</span>
                            @foreach ($role->courses as $course)
                                {{$course->course->name}},
                            @endforeach

                    </td>


                </tr>
            @endforeach


        </tbody>
    </table>
    {{ $roles->links() }}
</div>
