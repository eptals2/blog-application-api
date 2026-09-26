<?php

use App\Http\Controllers\EmployeeWebController;
use App\Http\Controllers\ProjectWebController;
use App\Http\Controllers\TaskWebController;
use App\Http\Controllers\WebAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [WebAuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [WebAuthController::class, 'login'])
    ->name('login.store');

Route::post('/logout', [WebAuthController::class, 'logout'])
    ->name('logout');

Route::middleware('admin.web')->group(function () {

    Route::get('/', function () {
        return redirect()->route('projects.index');
    });

    Route::resource('projects', ProjectWebController::class);

    Route::resource('employees', EmployeeWebController::class);

    Route::resource('tasks', TaskWebController::class);
});
