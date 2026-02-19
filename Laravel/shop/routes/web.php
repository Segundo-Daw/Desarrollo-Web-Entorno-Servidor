<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get("/", [OrderController::class, 'index'])->name('index');
Route::get("/client/create", [ClientController::class, 'create'])->name('client.create');

Route::delete("/order/{id}", [OrderController::class, "destroy"])->name('order.destroy');
Route::delete("/client/{id}", [ClientController::class, "destroy"])->name('client.destroy');






//AUTENTIFICACIÓN
//Rutas sin autenticar:
Route::middleware(['guest'])->group(function(){
    //Route::get('/login',[UserController::class, 'login'])->name('login');
});

//Rutes autenticados:
Route::middleware(['auth'])->group(function(){

    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/{id}', [UserController::class, 'update'])->name('update');

    Route::get('/logout', function(){
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/')->with('success', 'Sesión cerrada correctamente');
    })->name('logout');
});



/*
    GET /: devuelve un index con todos los Pedidos (Order) de la base de datos. Debajo habrá una lista con todos los clientes, y debajo de cada uno habrá un botón de eliminar que lanzará una petición DELETE /client/{id}.

    - `GET /client/create`: devuelve formulario para crear cliente.
*/
