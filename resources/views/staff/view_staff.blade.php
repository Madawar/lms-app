@extends('layouts.full_layout')

@section('main-heading')
    <h1
        class="p-4  text-center text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
        View Staff
    </h1>
@endsection
@section('secondary-heading')
    <h1
        class="p-4 text-center text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
        Heading </h1>
@endsection

@section('content')
@livewire('staff.staff-list')
@endsection

@section('secondary-content')
    <p>This is my Secondary body content.</p>
@endsection

@section('pre_jquery')
    <script>


    </script>

@endsection
