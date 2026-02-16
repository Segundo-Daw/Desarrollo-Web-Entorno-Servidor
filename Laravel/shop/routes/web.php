<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get("/", [OrderController::class, 'index'])->name('index');
Route::get("/client/create", [ClientController::class, 'create'])->name('client.create');

Route::delete("/order/{id}", [OrderController::class, "destroy"])->name('order.destroy');
Route::delete("/client/{id}", [ClientController::class, "destroy"])->name('client.destroy');






/*
    GET /: devuelve un index con todos los Pedidos (Order) de la base de datos. Debajo habrá una lista con todos los clientes, y debajo de cada uno habrá un botón de eliminar que lanzará una petición DELETE /client/{id}.

    - `GET /client/create`: devuelve formulario para crear cliente.
*/
