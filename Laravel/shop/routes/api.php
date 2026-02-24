<?php

use App\Http\Controllers\OrderApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
    GET /api/order: devuelve todas las orders de la base de datos.
    POST /api/order: insertar order en la bd
    DELETE /api/order/{id}: elimina de la bd esa order.
*/
Route::get('/order', [OrderApiController::class, 'index']);
//Route::post('/order', [OrderApiController::class, 'store']);
Route::post('/order', [OrderApiController::class, 'store']);
Route::delete('/order/{id}', [OrderApiController::class, 'destroy']);