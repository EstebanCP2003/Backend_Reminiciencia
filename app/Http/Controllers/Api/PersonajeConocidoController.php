<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PersonajeConocido;

class PersonajeConocidoController extends Controller
{
    public function index()
    {
        return response()->json(PersonajeConocido::with(['personaje', 'conocido'])->get(), 200);
    }

    public function show($id)
    {
        $personajeConocido = PersonajeConocido::with(['personaje', 'conocido'])->find($id);
        if (!$personajeConocido) {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }
        return response()->json($personajeConocido, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'personaje_id' => 'required|exists:personajes,id',
            'conocido_id' => 'required|exists:personajes,id|different:personaje_id',
        ]);

        $personajeConocido = PersonajeConocido::create($validated);

        return response()->json($personajeConocido, 201);
    }

    public function update(Request $request, $id)
    {
        $personajeConocido = PersonajeConocido::find($id);
        if (!$personajeConocido) {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }

        $validated = $request->validate([
            'personaje_id' => 'sometimes|exists:personajes,id',
            'conocido_id' => 'sometimes|exists:personajes,id|different:personaje_id',
        ]);

        $personajeConocido->update($validated);

        return response()->json($personajeConocido, 200);
    }

    public function destroy($id)
    {
        $personajeConocido = PersonajeConocido::find($id);
        if (!$personajeConocido) {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }

        $personajeConocido->delete();

        return response()->json(['message' => 'Registro eliminado correctamente'], 200);
    }
}
