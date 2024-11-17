<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ataque;


class AtaqueController extends Controller
{
    public function index()
    {
        return response()->json(Ataque::with('personaje')->get(), 200);
    }

    public function show($id)
    {
        $ataque = Ataque::with('personaje')->find($id);
        if (!$ataque) {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }
        return response()->json($ataque, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'personaje_id' => 'required|exists:personajes,id',
            'caracteristica' => 'required|string',
            'bonus_item' => 'sometimes|integer|min:0',
            'habilidad' => 'sometimes|integer|min:0',
        ]);

        $ataque = Ataque::create($validated);

        return response()->json($ataque, 201);
    }

    public function update(Request $request, $id)
    {
        $ataque = Ataque::find($id);
        if (!$ataque) {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }

        $validated = $request->validate([
            'personaje_id' => 'sometimes|exists:personajes,id',
            'caracteristica' => 'sometimes|string',
            'bonus_item' => 'sometimes|integer|min:0',
            'habilidad' => 'sometimes|integer|min:0',
        ]);

        $ataque->update($validated);

        return response()->json($ataque, 200);
    }

    public function destroy($id)
    {
        $ataque = Ataque::find($id);
        if (!$ataque) {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }

        $ataque->delete();

        return response()->json(['message' => 'Registro eliminado correctamente'], 200);
    }
}
