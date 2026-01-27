<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//creamos una ruta nueva de tipo GEt para simularla desde un navegador

Route::get("/hola", function(){
    return "hola mundo!";
});

Route::get("/hola/{name}", function($name){
    return "hola, $name!";
});


