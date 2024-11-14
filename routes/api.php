<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\jugadoresController;
use App\Http\Controllers\Api\loginController;

// Rutas de jugadores
Route::get('/jugadores', [jugadoresController::class, 'index']);
Route::get('/jugadores/{id}', [jugadoresController::class, 'show']);
Route::post('/jugadores', [jugadoresController::class, 'store']);
Route::put('/jugadores/{id}', [jugadoresController::class, 'update']);
Route::patch('/jugadores/{id}', [jugadoresController::class, 'updatePartial']);
Route::delete('/jugadores/{id}', [jugadoresController::class, 'eliminar']);

Route::get('/login', [loginController::class, 'logueo']);
Route::post('/login', [loginController::class, 'loginUser']);
Route::post('/logout', [loginController::class, 'logout']);




