<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FollowerController;
use App\Http\Controllers\Admin\VisitorController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\Admin\clientController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
   Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
   Route::get('user', [App\Http\Controllers\Admin\FollowerController::class, 'index']);
   Route::get('add-user', [App\Http\Controllers\Admin\FollowerController::class, 'create']);
   Route::post('add-user', [App\Http\Controllers\Admin\FollowerController::class, 'store']);
   Route::get('edit-user/{id}', [App\Http\Controllers\Admin\FollowerController::class, 'edit']);
   Route::put('update-user/{id}', [App\Http\Controllers\Admin\FollowerController::class, 'update']);
   Route::get('delete-user/{id}', [App\Http\Controllers\Admin\FollowerController::class, 'destroy']);

    Route::get('visitor', [App\Http\Controllers\Admin\VisitorController::class, 'index']);
    Route::get('add-visitor', [App\Http\Controllers\Admin\VisitorController::class, 'create']);
    Route::post('add-visitor', [App\Http\Controllers\Admin\VisitorController::class, 'store']);
    Route::get('edit-visitor/{id}', [App\Http\Controllers\Admin\VisitorController::class, 'edit']);
    Route::put('update-visitor/{id}', [App\Http\Controllers\Admin\VisitorController::class, 'update']);
    Route::get('delete-visitor/{id}', [App\Http\Controllers\Admin\VisitorController::class, 'destroy']);
});

Route::prefix('manager')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\ManagerController::class, 'index']);

    Route::get('task', [App\Http\Controllers\Admin\clientController::class, 'index']);
    Route::get('add-task', [App\Http\Controllers\Admin\clientController::class, 'create']);
    Route::post('add-task', [App\Http\Controllers\Admin\clientController::class, 'store']);
    Route::get('edit-task/{id}', [App\Http\Controllers\Admin\clientController::class, 'edit']);
    Route::put('update-task/{id}', [App\Http\Controllers\Admin\clientController::class, 'update']);
    Route::get('delete-task/{id}', [App\Http\Controllers\Admin\clientController::class, 'destroy']);

    Route::get('edit-manager/{id}', [App\Http\Controllers\Admin\clientController::class, 'editProfile']);
    Route::put('update-manager/{id}', [App\Http\Controllers\Admin\clientController::class, 'updateProfile']);
});

Route::prefix('user')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\UserController::class, 'index']);

    Route::get('edit-endUser/{id}', [App\Http\Controllers\Admin\UserController::class, 'editProfile']);
    Route::put('update-endUser/{id}', [App\Http\Controllers\Admin\UserController::class, 'updateProfile']);
});
