<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Personaje;


class PersonajeController extends Controller
{
    public function index()
    {
        return response()->json(Personaje::with('usuario')->get(), 200);
    }

    public function create($id)
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string',
            'nivel' => 'required|integer',
            'altura' => 'required|numeric|min:0',
            'usuario_id' => 'required|exists:usuarios,id',
        ]);

        $personaje = Personaje::create($validated);

        return response()->json($personaje, 201);
    }

    public function show(string $id)
    {
        $personaje = Personaje::with('usuario')->find($id);
        if (!$personaje) {
            return response()->json(['error' => 'Personaje no encontrado'], 404);
        }
        return response()->json($personaje, 200);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $personaje = Personaje::find($id);
        if (!$personaje) {
            return response()->json(['error' => 'Personaje no encontrado'], 404);
        }

        $validated = $request->validate([
            'nombre' => 'sometimes|string',
            'nivel' => 'sometimes|integer',
            'altura' => 'sometimes|numeric|min:0',
            'usuario_id' => 'sometimes|exists:usuarios,id',
        ]);

        $personaje->update($validated);

        return response()->json($personaje, 200);
    }

    public function destroy(string $id)
    {
        $personaje = Personaje::find($id);
        if (!$personaje) {
            return response()->json(['error' => 'Personaje no encontrado'], 404);
        }

        $personaje->delete();

        return response()->json(['message' => 'Personaje eliminado correctamente'], 200);
    }
}
