@extends('layouts.master_layout')
<?php use App\Models\Training; ?>
@section('main-heading')
    <h1
        class="p-4  text-center text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
        {{ $user->name }} Training Details
    </h1>
@endsection
@section('secondary-heading')
    <h1
        class="p-4 text-center text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
        Info </h1>
@endsection

@section('content')


    <div class="tabs tabs-boxed mb-2">
        @if ($view == 'preview')
            <a class="tab tab-active"
                href="{{ route('staff.show', ['staff' => $user->id, 'view' => 'preview']) }}">Preview</a>
        @else
            <a class="tab" href="{{ route('staff.show', ['staff' => $user->id, 'view' => 'preview']) }}">Preview</a>
        @endif

        @if ($view == 'update')
            <a class="tab tab-active"
                href="{{ route('staff.show', ['staff' => $user->id, 'view' => 'update']) }}">Update</a>
        @else
            <a class="tab " href="{{ route('staff.show', ['staff' => $user->id, 'view' => 'update']) }}">Update</a>
        @endif

    </div>

    @if ($view == 'preview')
        <table class="table-auto w-full border-collapse ">
            <thead>
                <tr>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        Training</th>
                        <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        Files</th>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        Last Trained On</th>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        Expiry</th>





                </tr>
            </thead>
            <tbody>
                @foreach ($user->courses as $course)
                    <tr
                        class="bg-white  lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                            <span
                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Training
                                Name</span>
                            @if ($course->course)
                                {{ $course->course->name }}

                            @endif
                        </td>
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                            <span
                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Training
                                Name</span>
                            @if ($course->course)

                                @foreach ($user->getMedia('certificates') as $media)
                                    @if ($media->getCustomProperty('course_id') == $course->course->id)
                                        <a href="{{ $media->getUrl() }}">[{{$loop->index+1}}]</a>
                                    @endif
                                @endforeach
                            @endif
                        </td>
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                            <span
                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Training
                                Name</span>
                            @if ($course->training)
                                {{ $course->training->done_on }}
                            @else
                                <span class="text-red-800"> Not Compliant </span>
                            @endif
                        </td>
                        <td
                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                            <span
                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Training
                                Name</span>
                            @if ($course->training)
                                {{ $course->training->date_of_expiry }}
                            @else
                                <span class="text-red-800"> Not Compliant </span>
                            @endif

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    @endif
    @if ($view == 'update')
        <table class="table-auto w-full border-collapse ">
            <thead>
                <tr>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        Training</th>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        Date Done</th>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        Attachments</th>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        Grade</th>
                    <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        Save</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($user->courses as $key => $cc)
                    <?php $training = new Training([
                    'course_id' => $cc->course->id,
                    'user_id' => $user->id,
                    'course_name' => $cc->course->name,
                    ]); ?>
                    @livewire('staff.upload-training',['training'=>$training],key($key))
                @endforeach


            </tbody>
        </table>
    @endif


@endsection

@section('secondary-content')
    <p>This is my Secondary body content.</p>
@endsection

@section('pre_jquery')
    <script>


    </script>

@endsection
