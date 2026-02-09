<?php

use App\Http\Controllers\JournalistApiController;
use App\Models\Journalist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//endpoint para que busquedas de prueba de Journalist
Route::get('/search', [JournalistApiController::class, "search"]);

Route::get("/journalist/{id}", [JournalistApiController::class, "show"]);
Route::post("/journalist", [JournalistApiController::class, "store"]);
Route::put("/journalist/{id}", [JournalistApiController::class, "update"]);
Route::delete("/journalist/{id}", [JournalistApiController::class, "destroy"]);


