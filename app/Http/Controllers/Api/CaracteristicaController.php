<?php

namespace App\Http\Controllers\Api;

use App\Models\Caracteristica;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CaracteristicaController extends Controller
{
    public function index()
    {
        return response()->json(Caracteristica::all(), 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|unique:caracteristicas',
        ]);

        $caracteristica = Caracteristica::create($validated);

        return response()->json($caracteristica, 201);
    }

    public function show(string $id)
    {
        $caracteristica = Caracteristica::find($id);
        if (!$caracteristica) {
            return response()->json(['error' => 'Característica no encontrada'], 404);
        }
        return response()->json($caracteristica, 200);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        $caracteristica = Caracteristica::find($id);
        if (!$caracteristica) {
            return response()->json(['error' => 'Característica no encontrada'], 404);
        }

        $caracteristica->delete();

        return response()->json(['message' => 'Característica eliminada correctamente'], 200);
    }
}

