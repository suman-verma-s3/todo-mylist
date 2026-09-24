<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.dashboard');

 Route::get('/my-todos', [TodoController::class, 'index'])
    ->middleware(['auth', 'permission:todo.view'])
    ->name('todos.index');

    Route::middleware(['auth', 'permission:todo.view'])->group(function () {

    Route::get('/my-todos', [TodoController::class, 'index'])
        ->name('todos.index');

    Route::get('/my-todos/create', [TodoController::class, 'create'])
        ->middleware('permission:todo.create')
        ->name('todos.create');

    Route::post('/my-todos', [TodoController::class, 'store'])
        ->middleware('permission:todo.create')
        ->name('todos.store');

    Route::get('/my-todos/{todo}', [TodoController::class, 'show'])
        ->name('todos.show');

    Route::get('/my-todos/{todo}/edit', [TodoController::class, 'edit'])
        ->middleware('permission:todo.edit')
        ->name('todos.edit');

    Route::put('/my-todos/{todo}', [TodoController::class, 'update'])
        ->middleware('permission:todo.edit')
        ->name('todos.update');

    Route::delete('/my-todos/{todo}', [TodoController::class, 'destroy'])
        ->middleware('permission:todo.delete')
        ->name('todos.destroy');
});

require __DIR__.'/auth.php';
