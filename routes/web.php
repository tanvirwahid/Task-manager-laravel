<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;

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
    'middleware' => 'auth'
], function (){
   Route::get('tasks', function () { return view('welcome');});
   Route::post('logout', [AuthController::class, 'logout'])->name('logout');

   Route::group([
       'prefix' => 'users',
       'as' => 'users.'
   ], function () {
       Route::get('/create', [UserController::class, 'create'])->name('create');
       Route::get('/', [UserController::class, 'index'])->name('index');
       Route::post('/', [UserController::class, 'store'])->name('store');
       Route::get('/{user}', [UserController::class, 'edit'])->name('edit');
       Route::put('/{user}', [UserController::class, 'update'])->name('update');
       Route::delete('/{user}', [UserController::class, 'destroy'])->name('delete');
   });

    Route::group([
        'prefix' => 'projects',
        'as' => 'projects.'
    ], function () {
        Route::get('/create', [ProjectController::class, 'create'])->name('create');
        Route::get('/', [ProjectController::class, 'index'])->name('index');
        Route::post('/', [ProjectController::class, 'store'])->name('store');
        Route::get('/{project}', [ProjectController::class, 'edit'])->name('edit');
        Route::put('/{project}', [ProjectController::class, 'update'])->name('update');
        Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('delete');
    });

});
