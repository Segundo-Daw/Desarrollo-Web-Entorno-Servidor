<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [OrderController::class, 'index'])->name('index');




//AUTENTICACIÓN
//Rutas sin autenticar:
Route::middleware(['guest'])->group(function () {
    // aquí las rutas para 
});

//Rutas autenticados:
Route::middleware(['auth'])->group(function () {
    //...
    Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::delete('/order/{id}', [OrderController::class, 'destroy'])->name('order.destroy');

    Route::get('/client/create', [ClientController::class, 'create'])->name('client.create');
    Route::post('/client', [ClientController::class, 'store'])->name('client.store');
    Route::delete('/client/{id}', [ClientController::class, 'destroy'])->name('client.destroy');

    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::put('/dashboard/{id}', [UserController::class, 'update'])->name('update');

    Route::get('/logout', function () {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/')->with('success', 'Sesión cerrada correctamente');
    })->name('logout');
});