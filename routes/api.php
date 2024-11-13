<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\jugadoresController;
use App\Http\Controllers\EstadisticasJugadorController;

// Rutas de jugadores
Route::get('/jugadores', [jugadoresController::class, 'index']);
Route::get('/jugadores/{id}', [jugadoresController::class, 'show']);
Route::post('/login', [jugadoresController::class, 'loginUser']);
Route::post('/jugadores', [jugadoresController::class, 'store']);
Route::put('/jugadores/{id}', [jugadoresController::class, 'update']);
Route::patch('/jugadores/{id}', [jugadoresController::class, 'updatePartial']);
Route::delete('/jugadores/{id}', [jugadoresController::class, 'eliminar']);

// Ruta para agregar estadísticas de jugador
Route::post('/estadisticas', [EstadisticasJugadorController::class, 'index']);
Route::post('/estadisticas', [EstadisticasJugadorController::class, 'store']);
