<?php

namespace App\Http\Controllers;

use App\Models\EstadisticasJugador;
use Illuminate\Http\Request;

class EstadisticasJugadorController extends Controller
{
    /**
     * Almacena un nuevo registro en la tabla `estadisticas_jugador`.
     */

    public function index(Request $request)
    {
        $estadisticasJugador = EstadisticasJugador::all();
        return response()->json($estadisticasJugador);
    }
    
    public function store(Request $request)
    {
        // Validación de los datos entrantes
        $validatedData = $request->validate([
            'nombre' => 'required|string',
            'nivel' => 'required|integer',
            'altura' => 'required|integer',
            'bloqueo_base' => 'required|integer',
            'bloqueo_constitucion' => 'required|integer',
            'bloqueo_item' => 'required|integer',
            'esquivar_base' => 'required|integer',
            'esquivar_destreza' => 'required|integer',
            'esquivar_item' => 'required|integer',
            'fuerza' => 'required|integer',
            'destreza' => 'required|integer',
            'constitucion' => 'required|integer',
            'inteligencia' => 'required|integer',
            'sabiduria' => 'required|integer',
            'apariencia' => 'required|integer',
            'estima' => 'required|integer',
            'balance' => 'required|integer',
            'resistencia' => 'required|integer',
            'conocimiento' => 'required|integer',
            'f_voluntad' => 'required|integer',
            'carisma' => 'required|integer',
            'musculatura' => 'required|integer',
            'punteria' => 'required|integer',
            'salud' => 'required|integer',
            'logica' => 'required|integer',
            'nutricio' => 'required|integer',
            'verborrea' => 'required|integer',
        ]);

        // Inserta un nuevo registro en la base de datos
        EstadisticasJugador::create($validatedData);

        // Responde con un mensaje de éxito
        return response()->json(['message' => 'Estadísticas agregadas exitosamente']);
    }

    public function show(Request $request)
    {
        $estadisticasJugador = EstadisticasJugador::find($request->id);
        return response()->json($estadisticasJugador);
    }
}
