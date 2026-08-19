<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


route::middleware('auth:sanctum')->group(function () {
    Route::get('/todos', [App\Http\Controllers\TodoController::class, 'index']);
    Route::Post('/todos', [App\Http\Controllers\TodoController::class, 'store']);
    route::get('/todos/{todo}', [App\Http\Controllers\TodoController::class, 'show']);
    Route::put('/todos/{todo}', [App\Http\Controllers\TodoController::class, 'update']);
    route::delete('/todos/{todo}', [App\Http\Controllers\TodoController::class, 'destroy']);
    route::post('/logout', [AuthController::class, 'logout']);
      Route::get('/intip-user', function (Request $request) {
        // Langsung melempar data user mentah-mentah tanpa saringan!
        return response()->json($request->user());
    });
});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
route::post('/logout', [AuthController::class, 'logout' ]);

