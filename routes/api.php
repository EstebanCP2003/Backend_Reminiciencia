<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\jugadoresController;
use App\Http\Controllers\Api\PersonajeController;
use App\Http\Controllers\Api\CaracteristicaController;
use App\Http\Controllers\Api\PersonajeCaracteristicaController;
use App\Http\Controllers\Api\ArmorClassController;
use App\Http\Controllers\Api\HitpointController;
use App\Http\Controllers\Api\AtaqueController;
use App\Http\Controllers\Api\PersonajeConocidoController;

Route::get('/jugadores', [jugadoresController::class, 'index']);

Route::get('/jugadores/{id}', [jugadoresController::class, 'show'] );
Route::post('/login', [jugadoresController::class, 'loginUser']);

Route::post('/jugadores', [jugadoresController::class, 'store']);

Route::put('/jugadores/{id}', [jugadoresController::class, 'update']);
Route::patch('/jugadores/{id}', [jugadoresController::class, 'updatePartial']);


Route::delete('/jugadores/{id}', [jugadoresController::class, 'eliminar']);

Route::get('/personajes', [PersonajeController::class, 'index']);
Route::get('/personajes/{id}', [PersonajeController::class, 'show']);
Route::post('/personajes', [PersonajeController::class, 'store']);
Route::put('/personajes/{id}', [PersonajeController::class, 'update']);
Route::delete('/personajes/{id}', [PersonajeController::class, 'destroy']);

Route::get('/caracteristicas', [CaracteristicaController::class, 'index']);
Route::post('/caracteristicas', [CaracteristicaController::class, 'store']);
Route::get('/caracteristicas/{id}', [CaracteristicaController::class, 'show']);
Route::put('/caracteristicas/{id}', [CaracteristicaController::class, 'update']);
Route::delete('/caracteristicas/{id}', [CaracteristicaController::class, 'destroy']);

Route::get('/personaje-caracteristicas', [PersonajeCaracteristicaController::class, 'index']);
Route::get('/personaje-caracteristicas/{id}', [PersonajeCaracteristicaController::class, 'show']);
Route::post('/personaje-caracteristicas', [PersonajeCaracteristicaController::class, 'store']);
Route::put('/personaje-caracteristicas/{id}', [PersonajeCaracteristicaController::class, 'update']);
Route::delete('/personaje-caracteristicas/{id}', [PersonajeCaracteristicaController::class, 'destroy']);

Route::get('/armor-class', [ArmorClassController::class, 'index']);
Route::get('/armor-class/{id}', [ArmorClassController::class, 'show']);
Route::post('/armor-class', [ArmorClassController::class, 'store']);
Route::put('/armor-class/{id}', [ArmorClassController::class, 'update']);
Route::delete('/armor-class/{id}', [ArmorClassController::class, 'destroy']);

Route::get('/hitpoints', [HitpointController::class, 'index']);
Route::get('/hitpoints/{id}', [HitpointController::class, 'show']);
Route::post('/hitpoints', [HitpointController::class, 'store']);
Route::put('/hitpoints/{id}', [HitpointController::class, 'update']);
Route::delete('/hitpoints/{id}', [HitpointController::class, 'destroy']);

Route::get('/ataques', [AtaqueController::class, 'index']);
Route::get('/ataques/{id}', [AtaqueController::class, 'show']);
Route::post('/ataques', [AtaqueController::class, 'store']);
Route::put('/ataques/{id}', [AtaqueController::class, 'update']);
Route::delete('/ataques/{id}', [AtaqueController::class, 'destroy']);

Route::get('/personajes-conocidos', [PersonajeConocidoController::class, 'index']);
Route::get('/personajes-conocidos/{id}', [PersonajeConocidoController::class, 'show']);
Route::post('/personajes-conocidos', [PersonajeConocidoController::class, 'store']);
Route::put('/personajes-conocidos/{id}', [PersonajeConocidoController::class, 'update']);
Route::delete('/personajes-conocidos/{id}', [PersonajeConocidoController::class, 'destroy']);