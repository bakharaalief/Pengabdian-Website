<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NormalController;
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
Route::prefix('/user')->middleware(['isAdmin', 'auth'])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
