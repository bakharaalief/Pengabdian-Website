<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NormalController;
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
Route::resource('/class', ClassController::class)->middleware(['isGuru', 'auth']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
