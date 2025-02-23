<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\AdminController;



Route::get('/', function () {
    return redirect()->route('login');
})->middleware('guest');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('projects', ProjectController::class);
Route::post('/projects/{id}/invite', [ProjectController::class, 'inviteUser'])->name('projects.invite');
Route::resource('tasks', TaskController::class);
Route::resource('users', UserController::class);
Route::resource('notifications', NotificationController::class);
Route::resource('files', FileController::class);
Route::patch('/tasks/{task}/complete', [TaskController::class, 'markAsCompleted'])->name('tasks.complete');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('tasks', TaskController::class)->only(['index', 'show']);
});



Route::get('/admin', [AdminController::class, 'index'])->middleware('admin');