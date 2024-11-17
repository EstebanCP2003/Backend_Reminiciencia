<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jugadores;
use App\Models\Logueo;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function logueo()
    {
        // Obtener todos los registros en la tabla `logueo` donde el estado sea "activo"
        $usuariosLogueados = Logueo::where('estado', 'activo')->get();

        if ($usuariosLogueados->isEmpty()) {
            return response()->json([
                'message' => 'No hay usuarios logueados',
                'status' => 404
            ], 404);
        }

        // Obtener los detalles de los jugadores a partir de los IDs en `logueo`
        $jugadoresLogueados = Jugadores::whereIn('id', $usuariosLogueados->pluck('jugador_id'))->get();

        return response()->json([
            'message' => 'Usuarios logueados',
            'jugadores' => $jugadoresLogueados,
            'status' => 200
        ], 200);
    }
  
    public function loginUser(Request $request)
    {
        // Validación de los datos de entrada
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
            'rol' => 'required|string|in:master,jugador'  // Cambiar `role` a `rol`
        ]);

        $jugador = Jugadores::where('name', $request->name)
                            ->where('password', $request->password)
                            ->first();

        if ($jugador) {
            // Almacenar al usuario en la sesión
            session(['jugador' => $jugador->id]);

            // Registrar el inicio de sesión en la tabla `logueo` o actualizar su estado a "activo"
            $logueo = Logueo::updateOrCreate(
                ['jugador_id' => $jugador->id],
                ['estado' => 'activo', 'rol' => $request->rol]  // Cambiar `role` a `rol`
            );

            return response()->json([
                'message' => 'Usuario logueado exitosamente',
                'jugador' => $jugador,
                'status' => 200
            ], 200);
        }

        return response()->json([
            'message' => 'Credenciales incorrectas',
            'status' => 401
        ], 401);
    }

    public function logout(Request $request)
    {
        // Obtener el ID del jugador desde la sesión
        $jugadorId = session('jugador');

        // Verificar si el jugador está en la sesión
        if ($jugadorId) {
            // Verificar que el nombre y contraseña proporcionados coincidan con un registro activo
            $jugador = Jugadores::where('id', $jugadorId)
                                ->where('name', $request->name)
                                ->where('password', $request->password)
                                ->first();

            if ($jugador) {
                // Intentar actualizar el estado en la tabla `logueo` a 'inactivo' para el jugador
                $updated = Logueo::where('jugador_id', $jugadorId)
                                ->where('estado', 'activo')
                                ->update(['estado' => 'inactivo']);

                // Si la actualización fue exitosa, eliminar la sesión y devolver una respuesta
                if ($updated) {
                    // Eliminar el jugador de la sesión
                    Session::forget('jugador');

                    return response()->json([
                        'message' => 'Usuario deslogueado y estado actualizado a inactivo',
                        'status' => 200
                    ], 200);
                }

                // Si no se encuentra un registro activo para el jugador, devolver un mensaje de error
                return response()->json([
                    'message' => 'Error al desloguear: el usuario no está activo en logueo',
                    'status' => 400
                ], 400);
            }

            // Si no coincide nombre y contraseña, retornar un mensaje de error
            return response()->json([
                'message' => 'Credenciales incorrectas para deslogueo',
                'status' => 401
            ], 401);
        }

        // Si no hay jugador en la sesión, retornar mensaje de error
        return response()->json([
            'message' => 'No hay usuario logueado en la sesión',
            'status' => 401
        ], 401);
    }
}
