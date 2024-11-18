<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ArmorClass;

class ArmorClassController extends Controller
{
    public function index()
    {
        return response()->json(ArmorClass::with('personaje')->get(), 200);
    }

    public function show($id)
    {
        $armorClass = ArmorClass::with('personaje')->find($id);
        if (!$armorClass) {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }
        return response()->json($armorClass, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'personaje_id' => 'required|exists:personajes,id',
            'tipo' => 'required|in:bloqueo,esquivar',
            'base' => 'required|integer|min:0',
            'constitucion' => 'required|integer|min:0',
            'items' => 'sometimes|integer|min:0',
        ]);

        $armorClass = ArmorClass::create($validated);

        return response()->json($armorClass, 201);
    }

    public function update(Request $request, $id)
    {
        $armorClass = ArmorClass::find($id);
        if (!$armorClass) {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }

        $validated = $request->validate([
            'personaje_id' => 'sometimes|exists:personajes,id',
            'tipo' => 'sometimes|in:bloqueo,esquivar',
            'base' => 'sometimes|integer|min:0',
            'constitucion' => 'sometimes|integer|min:0',
            'items' => 'sometimes|integer|min:0',
        ]);

        $armorClass->update($validated);

        return response()->json($armorClass, 200);
    }

    public function destroy($id)
    {
        $armorClass = ArmorClass::find($id);
        if (!$armorClass) {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }

        $armorClass->delete();

        return response()->json(['message' => 'Registro eliminado correctamente'], 200);
    }
}
