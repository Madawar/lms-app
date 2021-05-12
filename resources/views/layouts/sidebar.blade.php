<?php
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StaffController;

use Illuminate\Support\Str;
?>
<div @click.away="open = false"
    class="flex flex-col w-full md:w-64 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0  border-r  border-gray-100 border-opacity-90 "
    x-data="{ open: false }">
    <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">
        <a href="#"
            class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
            Hi, {{ Str::of(Auth::user()->name)->explode(' ')[0] }}
        </a>
        <button class="rounded-lg md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                <path x-show="!open" fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
                <path x-show="open" fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
    <nav :class="{'block': open, 'hidden': !open}" class="flex-grow md:block px-1 pb-4 md:pb-0 md:overflow-y-auto  ">

        <ul class="menu  w-full ">
            <li>
                <a href="/dashboard">

                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 mr-2 stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                      </svg>
                    Dashboard
                </a>
            </li>
            <li class="menu-title">
                <span>
                    Daily Activities
                </span>
            </li>
            <li>
                <a href="{{ action([CourseController::class, 'create']) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 mr-2 stroke-current" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Create Course
                </a>
                <ul class="menu">
                    <li>
                        <a href="{{ action([CourseController::class, 'index']) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 mr-2 stroke-current"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            View Courses

                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ action([RoleController::class, 'create']) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 mr-2 stroke-current" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Create Role
                </a>
                <ul class="menu">
                    <li>
                        <a href="{{ action([RoleController::class, 'index']) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 mr-2 stroke-current"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            View Roles

                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ action([StaffController::class, 'create']) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 mr-2 stroke-current" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Create User
                </a>
                <ul class="menu">
                    <li>
                        <a href="{{ action([StaffController::class, 'index']) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 mr-2 stroke-current"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            View Users

                        </a>
                    </li>
                </ul>
            </li>

    </nav>
</div>
