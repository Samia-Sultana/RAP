<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => 'useradmin'], function () {
    Route::get('role', [RoleController::class, 'list']);
    Route::get('role/add', [RoleController::class, 'add']);
    Route::post('role/add', [RoleController::class, 'insert']);
    Route::get('role/edit/{id}', [RoleController::class, 'edit']);
    Route::post('role/edit/{id}', [RoleController::class, 'update']);
    Route::get('role/delete/{id}', [RoleController::class, 'delete']);

    Route::get( 'user', [UserController::class, 'list']);
    Route::get('user/add', [UserController::class, 'add']);
    Route::post('user/add', [UserController::class, 'insert']);
    Route::get('user/edit/{id}', [UserController::class, 'edit']);
    Route::post('user/edit/{id}', [UserController::class, 'update']);
    Route::get('user/delete/{id}', [UserController::class, 'delete']);
    Route::get('user/create/{id}', [UserController::class, 'sendEmail']);




});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
