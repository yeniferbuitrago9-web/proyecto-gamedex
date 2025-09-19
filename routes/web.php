<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Producto\ProductoController;
use App\Http\Controllers\carrito\CarritoController;
use App\Http\Controllers\carritoItem\CarritoItemController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TransaccioneController;
use App\Models\Producto; // <--- IMPORTANTE

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::resource('producto', ProductoController::class)->names('producto');
    Route::resource('carrito', CarritoController::class)->names('carrito');
    Route::resource('usuario', UsuarioController::class)->names('usuario');
    Route::resource('transacciones', TransaccioneController::class)->names('transaccione');
    Route::delete('carrito/item/{item}', [CarritoItemController::class, 'destroy'])->name('carrito.item.destroy');
  Route::delete('/carrito/vaciar', [CarritoController::class, 'vaciar'])
    ->name('carrito.vaciar');


    Route::get('/dashboard', function () {
        $productos = Producto::all(); // Trae todos los productos
        return view('dashboard', ['productos' => $productos]);
    })->middleware(['auth'])->name('dashboard');
});

Route::get('/', function () {
    return view('welcome');
});
