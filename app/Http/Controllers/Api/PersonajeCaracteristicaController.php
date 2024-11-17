<?php

namespace App\Http\Controllers\Api;

use App\Models\PersonajeCaracteristica;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PersonajeCaracteristicaController extends Controller
{
    public function index()
    {
        return response()->json(PersonajeCaracteristica::with(['personaje', 'caracteristica'])->get(), 200);
    }

    public function show($id)
    {
        $personajeCaracteristica = PersonajeCaracteristica::with(['personaje', 'caracteristica'])->find($id);
        if (!$personajeCaracteristica) {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }
        return response()->json($personajeCaracteristica, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'personaje_id' => 'required|exists:personajes,id',
            'caracteristica_id' => 'required|exists:caracteristicas,id',
            'puntos_base' => 'sometimes|integer|min:0',
            'bonificador' => 'sometimes|integer|min:0',
            'bonificador_competencia' => 'sometimes|integer|min:0',
            'bonificador_equipo' => 'sometimes|integer|min:0',
            'se_suma_al_dado' => 'sometimes|boolean',
        ]);

        $personajeCaracteristica = PersonajeCaracteristica::create($validated);

        return response()->json($personajeCaracteristica, 201);
    }

    public function update(Request $request, $id)
    {
        $personajeCaracteristica = PersonajeCaracteristica::find($id);
        if (!$personajeCaracteristica) {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }

        $validated = $request->validate([
            'personaje_id' => 'sometimes|exists:personajes,id',
            'caracteristica_id' => 'sometimes|exists:caracteristicas,id',
            'puntos_base' => 'sometimes|integer|min:0',
            'bonificador' => 'sometimes|integer|min:0',
            'bonificador_competencia' => 'sometimes|integer|min:0',
            'bonificador_equipo' => 'sometimes|integer|min:0',
            'se_suma_al_dado' => 'sometimes|boolean',
        ]);

        $personajeCaracteristica->update($validated);

        return response()->json($personajeCaracteristica, 200);
    }

    public function destroy($id)
    {
        $personajeCaracteristica = PersonajeCaracteristica::find($id);
        if (!$personajeCaracteristica) {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }

        $personajeCaracteristica->delete();

        return response()->json(['message' => 'Registro eliminado correctamente'], 200);
    }
}
