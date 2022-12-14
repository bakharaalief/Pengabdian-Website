<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceStudentController;
use App\Http\Controllers\BapController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NormalController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', fn () => dd( asset('assets/img/favicon.png')) );

//normal route
Route::prefix('/')->group(function () {
    Route::get('/', [NormalController::class, 'index'])->name('normal.home');
});

//user route
Route::resource('/user', UserController::class)->middleware(['isAdmin', 'auth']);

//student route
Route::resource('/student', StudentController::class)->middleware(['isGuru', 'auth']);

//class route
Route::resource('/class', ClassController::class)->middleware(['isSukarelawan', 'auth']);

//class route
Route::resource('/detail-class', StudentClassController::class)->middleware(['isSukarelawan', 'auth']);

// attendance route
Route::resource('/attendance', AttendanceController::class)->middleware(['isSukarelawan', 'auth']);

// bap route
Route::resource('/bap', BapController::class)->middleware(['isSukarelawan', 'auth']);
Route::get('/bap-form/{id}', [BapController::class, 'showForm'])->middleware(['isSukarelawan', 'auth']);

// attendance students route
Route::resource('/detail-attendance', AttendanceStudentController::class)->middleware(['isSukarelawan', 'auth']);
Route::get('/detail-attendance-form/{id}', [AttendanceStudentController::class, 'showForm'])->middleware(['isSukarelawan', 'auth']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
