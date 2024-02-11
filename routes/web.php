<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthController::class, 'showLoginPage'])
    ->name('login')
    ->middleware('guest');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegistrationPage'])
    ->middleware('guest');
Route::post('register', [AuthController::class, 'register']);

Route::group([
    'middleware' => 'auth',
], function () {

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::group([
        'middleware' => 'manager',
        'prefix' => 'users',
        'as' => 'users.',
    ], function () {
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::get('/{user}', [UserController::class, 'edit'])->name('edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('delete');
    });

    Route::group([
        'prefix' => 'tasks',
        'as' => 'tasks.',
    ], function () {

        Route::group([
            'middleware' => 'manager'
        ], function () {
            Route::get('/create/{project}', [TaskController::class, 'create'])->name('create');
            Route::post('/', [TaskController::class, 'store'])->name('store');
            Route::delete('/{task}', [TaskController::class, 'destroy'])->name('delete');
            Route::POST('/assign/{id}', [TaskController::class, 'assign'])->name('assign');
        });

        Route::get('/', [TaskController::class, 'index'])->name('index');
        Route::get('/{task}', [TaskController::class, 'edit'])->name('edit');
        Route::put('/{task}', [TaskController::class, 'update'])->name('update');

    });

    Route::group([
        'middleware' => 'manager',
        'prefix' => 'projects',
        'as' => 'projects.',
    ], function () {
        Route::get('/create', [ProjectController::class, 'create'])->name('create');
        Route::get('/', [ProjectController::class, 'index'])->name('index');
        Route::post('/', [ProjectController::class, 'store'])->name('store');
        Route::get('/{project}', [ProjectController::class, 'edit'])->name('edit');
        Route::put('/{project}', [ProjectController::class, 'update'])->name('update');
        Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('delete');
    });

});
