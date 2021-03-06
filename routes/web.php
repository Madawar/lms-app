<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('role', RoleController::class)->middleware('auth');
Route::resource('course', CourseController::class)->middleware('auth');
Route::resource('staff', StaffController::class)->middleware('auth');
