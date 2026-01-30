<?php

use App\Http\Controllers\JournalistController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//creamos una ruta nueva de tipo GEt para simularla desde un navegador
/*
Route::get("/hola", function(){
    return "hola mundo!";
});

Route::get("/hola/{name}", function($name){
    return "hola, $name!";
});
*/


Route::get("/journalist", [JournalistController::class, "index"])->name('journalist'); 
//Pasar paŕametros (para probar)
Route::get("/name/{name}", [JournalistController::class, "sayName"]);
//Esto para devolver la visto con el formulario de creación
Route::get("/journalist/create", [JournalistController::class, "create"])->name('journalist.create');
//Esto es para guardar el journalist con los datos rellenados del formulario de creación
//al darle un nombre a la ruta, lluego la puedo utlizar para referenciarla desde el resto de mi proyecto
Route::post("/journalist", [JournalistController::class, "store"])->name('journalist.store');
Route::get("/journalist/{id}", [JournalistController::class, "show"]);
Route::get("/journalist/{id}/edit", [JournalistController::class, "edit"]);
Route::put("/journalist/{id}", [JournalistController::class, "update"]);
Route::delete("/journalist/{id}", [JournalistController::class, "destroy"]);






