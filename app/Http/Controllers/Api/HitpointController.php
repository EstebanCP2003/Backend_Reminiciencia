<?php


namespace App\Http\Controllers\Api;

use App\Models\Personaje; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hitpoints;

class HitpointController extends Controller
{
    public function index()
    {
        return response()->json(Hitpoints::with('personaje')->get(), 200);
    }

    public function show($id)
    {
        $hitpoints = Hitpoints::with('personaje')->find($id);
        if (!$hitpoints) {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }
        return response()->json($hitpoints, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'personaje_id' => 'required|exists:personajes,id',
            'base' => 'required|integer|min:0',
            'dano_sufrido' => 'sometimes|integer|min:0',
        ]);

        // Verificación explícita de existencia de personaje
        $personaje = Personaje::find($validated['personaje_id']);
        if (!$personaje) {
            return response()->json(['error' => 'Personaje no encontrado'], 404);
        }

        $hitpoints = Hitpoints::create($validated);

        return response()->json($hitpoints, 201);
    }

    public function update(Request $request, $id)
    {
        $hitpoints = Hitpoints::find($id);
        if (!$hitpoints) {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }

        $validated = $request->validate([
            'personaje_id' => 'sometimes|exists:personajes,id',
            'base' => 'sometimes|integer|min:0',
            'dano_sufrido' => 'sometimes|integer|min:0',
        ]);

        $hitpoints->update($validated);

        return response()->json($hitpoints, 200);
    }

    public function destroy($id)
    {
        $hitpoints = Hitpoints::find($id);
        if (!$hitpoints) {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }

        $hitpoints->delete();

        return response()->json(['message' => 'Registro eliminado correctamente'], 200);
    }
}
