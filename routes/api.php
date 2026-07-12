<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Guard;

route::middleware('auth:sanctum')->group(function () {
    Route::get('/todos', [App\Http\Controllers\TodoController::class, 'index']);
    Route::Post('/todos', [App\Http\Controllers\TodoController::class, 'store']);
    route::get('/todos/{todo}', [App\Http\Controllers\TodoController::class, 'show']);
    Route::put('/todos/{todo}', [App\Http\Controllers\TodoController::class, 'update']);
    route::delete('/todos/{todo}', [App\Http\Controllers\TodoController::class, 'destroy']);
});
