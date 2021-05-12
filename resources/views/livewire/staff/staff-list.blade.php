<div>

<?php use Carbon\Carbon;
use Illuminate\Support\Str;

?>
    <div class="flex flex-col md:flex-row space-y-2 md:space-y-0  md:space-x-1 bg-gray-500 border p-2 ">
        <div class="flex-auto ">

            <x-forms.select label="" placeholder="Staff" name="trainings" :options="$courses" />
        </div>
        <div class="flex-auto">
            <?php $options = [''=>'Pick A filter','missing' => 'Misssing Training', 'valid' => 'Valid Trainings','expired'=>'Expired']; ?>
            <x-forms.select label="" placeholder="Staff" name="filter" :options="$options" />
        </div>

        <div class="flex-auto ">

        </div>

        <div class="flex-auto ">

            <button class="btn btn-square" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>

        </div>

    </div>

    <table class="table-auto w-full border-collapse ">
        <thead class="">
            <tr>
                <th
                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Name</th>
                <th
                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Role</th>
                <th
                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Missing Trainings</th>
                <th
                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Valid</th>
                <th
                    class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                    Expired Trainings</th>




            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)

                <tr
                    class="bg-white  lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-left border border-b block lg:table-cell relative lg:static">
                        <span
                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Staff
                            Name</span>
                        <a href="{{ route('staff.show', ['staff' => $user->id]) }}">{{ $user->name }}</a>
                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-left border border-b block lg:table-cell relative lg:static">
                        <span
                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Role</span>
                        @if (isset($user->role))
                        <span class="text-sm">  {{ Str::limit($user->role->name,15) }}</span>
                        @endif
                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 align-top border border-b block lg:table-cell relative lg:static">
                        <span
                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Missing
                            Trainings</span>

                            @foreach ($user->courses->whereNull('done_on') as $course)
                                <span class="text-xs">{{$course->course->name}}</span><br/>
                            @endforeach

                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 align-top border border-b block lg:table-cell relative lg:static">
                        <span
                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Valid
                            Trainings</span>

                            @foreach ($user->courses->whereNotNull('done_on')->where('date_of_expiry','>=',Carbon::today()->startOfDay()) as $course)
                                <span class="text-xs">{{$course->course->name}}</span><br/>
                            @endforeach

                    </td>
                    <td
                        class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span
                            class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Expired
                            Trainings</span>

                            @foreach ($user->courses->where('date_of_expiry','<=',Carbon::today()->startOfDay()) as $course)
                                <span class="text-xs">{{$course->course->name}}</span>
                            @endforeach

                    </td>


                </tr>
            @endforeach


        </tbody>
    </table>
    {{ $users->links() }}
</div>

<script>
    document.addEventListener('livewire:load', function () {
        // Your JS here.
    })
</script>
