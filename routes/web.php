<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TodoController as AdminTodoController;
use App\Http\Controllers\TodoController as UserTodoController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| User Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Admin Dashboard
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | Admin User Management
        |--------------------------------------------------------------------------
        */

        Route::resource('users', UserController::class)
            ->only([
                'index',
                'create',
                'store',
            ]);


        /*
        |--------------------------------------------------------------------------
        | Admin Todo Management
        |--------------------------------------------------------------------------
        */

        Route::resource('todos', AdminTodoController::class)
            ->only([
                'index',
                'create',
                'store',
                'show',
                'edit',
                'update',
                'destroy',
            ]);

    });


/*
|--------------------------------------------------------------------------
| USER TODO ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'permission:todo.view'
])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | My Tasks
    |--------------------------------------------------------------------------
    */

    Route::get('/my-todos', [UserTodoController::class, 'index'])
        ->name('todos.index');


    /*
    |--------------------------------------------------------------------------
    | Create Task
    |--------------------------------------------------------------------------
    */

    Route::get('/my-todos/create', [UserTodoController::class, 'create'])
        ->middleware('permission:todo.create')
        ->name('todos.create');


    /*
    |--------------------------------------------------------------------------
    | Store Task
    |--------------------------------------------------------------------------
    */

    Route::post('/my-todos', [UserTodoController::class, 'store'])
        ->middleware('permission:todo.create')
        ->name('todos.store');


    /*
    |--------------------------------------------------------------------------
    | View Task
    |--------------------------------------------------------------------------
    */

    Route::get('/my-todos/{todo}', [UserTodoController::class, 'show'])
        ->name('todos.show');


    /*
    |--------------------------------------------------------------------------
    | Edit Task
    |--------------------------------------------------------------------------
    */

    Route::get('/my-todos/{todo}/edit', [UserTodoController::class, 'edit'])
        ->middleware('permission:todo.edit')
        ->name('todos.edit');


    /*
    |--------------------------------------------------------------------------
    | Update Task
    |--------------------------------------------------------------------------
    */

    Route::put('/my-todos/{todo}', [UserTodoController::class, 'update'])
        ->middleware('permission:todo.edit')
        ->name('todos.update');


    /*
    |--------------------------------------------------------------------------
    | Delete Task
    |--------------------------------------------------------------------------
    */

    Route::delete('/my-todos/{todo}', [UserTodoController::class, 'destroy'])
        ->middleware('permission:todo.delete')
        ->name('todos.destroy');

});


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';