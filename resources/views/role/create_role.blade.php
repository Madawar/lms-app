@extends('layouts.master_layout')

@section('main-heading')
    <h1
        class="p-4  text-center text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
        Create Role
    </h1>
@endsection
@section('secondary-heading')
    <h1
        class="p-4 text-center text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
        Info </h1>
@endsection

@section('content')
    @livewire('role.role-create')
@endsection

@section('secondary-content')
    <p>This is my Secondary body content.</p>
@endsection

@section('pre_jquery')
    <script>


    </script>

@endsection
