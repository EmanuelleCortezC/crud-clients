<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClientsController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return response()->json([$request->user()], 200);
    });
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/client', [ClientsController::class, 'index']);
});
