<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/usuarios/crear', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.sesion');
Route::post('/store', [UsersController::class, 'store']);
Route::get('users/activate/account/{token}', [LoginController::class, 'activateAccount']);

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/usuarios', [UsersController::class, 'index']);
    Route::get('/eliminar/usuario/{id}', [UsersController::class, 'destroy']);
    Route::get('/usuarios/{id}/Actualizar', [UsersController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{id}/Actualizar', [UsersController::class, 'update'])->name('usuarios.update');
    Route::get('/usuarios/buscar', [UsersController::class, 'searchById']);
    
    Route::resource('posts',BlogController::class);
    Route::resource('posts', App\Http\Controllers\BlogController::class);
    Route::get('/blogs/buscar', [BlogController::class, 'buscar']);
});


