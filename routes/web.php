<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Producto\ProductoController;
use App\Http\Controllers\carrito\CarritoController;
use App\Http\Controllers\usuarioController;

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::resource('producto', ProductoController::class)->names('producto');
      Route::resource('carrito', CarritoController::class)->names('carrito');
      Route::resource('usuario', UsuarioController::class)->names('usuario');
      Route::resource('transacciones', TransaccioneController::class)->names('transaccione');;
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/', function () {
    return view('welcome');
});