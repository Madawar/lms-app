<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ env('APP_NAME') }}</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    @livewireStyles
</head>

<body class="">

    @include('layouts.header')
    <div class="md:flex flex-col md:flex-row md:min-h-screen  w-full">
        @include('layouts.sidebar')
        <div class=" md:flex flex-col md:flex-row md:min-h-screen  w-full" id="main-app">
            <div class="w-full ">
                <div class="heading border-b border-gray-100 border-opacity-90 ">
                    @section('main-heading')

                @show

                </div>
                @yield('content')

            </div>

        </div>
    </div>

    @livewireScripts
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>


    @yield('pre_jquery')
    @yield('jquery')
</body>

</html>
