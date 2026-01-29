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

Route::get("/journalist", [JournalistController::class, "index"]);

//Pasar paŕametros (para probar)
Route::get("/name/{name}", [JournalistController::class, "sayName"]);

    
//Esto para devolver la visto con el formulario de creación
Route::get("/journalist/create", [JournalistController::class, "create"]);

//Esto es para guardar el journalist con los datos rellenados del formulario de creación
Route::post("/journalist/create", [JournalistController::class, "store"]);




