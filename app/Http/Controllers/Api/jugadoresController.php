<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jugadores;
use Illuminate\Support\Facades\Validator;

class jugadoresController extends Controller
{
    public function index(){
        $jugador = Jugadores::all(); // Me retorna un arreglo

        if($jugador->isEmpty()){ // Si jugadores está vacio me retorna un mensaje

            $data_info = [
                'message'=> 'No hay jugadores registrados',
                'status'=> 200
            ];
            return response()->json($data_info, 404);
        }
        return response()->json($jugador, 200);
    }

    public function store(Request $request)
    {

        $validador = Validator::make($request->all(), [
            'name'=>'required|max:205',
            'email'=>'required|email|unique:jugadores',
            'phone'=>'required|digits:10',
            'password'=>'required|string|min:8'
        ]);

        if($validador ->fails()) //Si esto falla
        {
            $dato = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validador->errors(),
                'status' => 404
            ];

            return response()->json($dato, 400);
        }

        $jugador = Jugadores::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
        ]);

        if(!$jugador){
            $dato =[
                'message' => 'Error al crear un estudiante',
                'status' => 500
            ];
            return response()->json($dato, 500);
        }

        $dato = [
            'jugador' => $jugador,
            'status' => 201
        ];

        return response()->json($dato, 201);
    }

    public function show($id){
        $jugador = Jugadores::find($id);

        if(!$jugador){
            $data_info = [
                'message' => 'El jugador no ha sido encontrado en la base de datos',
                'status' => 404
            ];

            return response()->json($data_info, 404);
        }

        $data = [
            'message' => $jugador,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function eliminar($id){
        $jugador = Jugadores::find($id);

        if(!$jugador){
            $data_info = [
                'message' => 'El jugador no fue encontrado',
                'status' => 404
            ];

            return response()->json($data_info, 404);
        }

         $jugador->delete();

         $dato = [
            'message' => 'El jugador ha sido eliminado',
            'status' => 200
         ];

         return response()->json($dato, 200);

    }

    public function update(Request $request, $id){

        $jugador = Jugadores::find($id);

        if(!$jugador){
            $data_info =[
                'message' => 'Jugador no encontrado',
                'status' => 404
            ];
            return response()->json($data_info, 404);
        }

        $validador = Validator::make($request->all(), [
            'name'=>'required|max:205',
            'email'=>'required|email|unique:jugadores',
            'phone'=>'required|digits:10',
            'password'=>'required|string|min:8'
        ]);

        if($validador->fails()){
            $data_info = [
                'message' => 'Error al actualizar los datos del jugador',
                'errors' => $validador->errors(),
                'status' => 400
            ];
            return response()->json($data_info, 400);
        }

        $jugador->name = $request->name;
        $jugador->email = $request->email;
        $jugador->phone = $request->phone;
        $jugador->password = $request->password;

        $jugador->save();

        $data = [
            'message' => 'El jugador ha sido actualizado',
            'jugador' => $jugador,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id){
        
        $jugador = Jugadores::find($id);

        if(!$jugador){
            $data_info = [
                'message' => 'Jugador no encontrado',
                'status' => 404
            ];

            return response()->json($data_info, 404);
        }


        $validador = Validator::make($request->all(), [
            'name'=>'max:205',
            'email'=>'email|unique:jugadores',
            'phone'=>'digits:10',
            'password'=>'string|min:8' 
        ]);

        if($validador->fails()){
            $data_info = [
                'message' => 'Error en la validación de los datos del jugador',
                'errors' => $validador->errors(),
                'status' => 400
            ];
            return response()->json($data_info, 400);
        }

        if($request->has('name')){
            $jugador->name = $request->name;
        }

        if($request->has('email')){
            $jugador->email = $request->email;
        }

        if($request->has('phone')){
            $jugador->phone = $request->phone;
        }

        if($request->has('password')){
            $jugador->password = $request->password;
        }

        $jugador->save();

        $data =[
            'message' => 'Jugador Actualizado',
            'jugador' => $jugador,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function loginUser(Request $request)
    {
        // Validar los datos recibidos
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos inválidos',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }

        // Buscar al jugador por nombre de usuario (suponiendo que 'name_u' es el campo de nombre de usuario)
        $jugador = Jugadores::where('name', $request->name)->first();

        if (!$jugador) {
            return response()->json([
                'message' => 'Usuario no encontrado',
                'status' => 404
            ], 404);
        }

        // Verificar si la contraseña proporcionada coincide con la guardada (sin hash)
        if ($jugador->password !== $request->password) {
            return response()->json([
                'message' => 'Contraseña incorrecta',
                'status' => 401
            ], 401);
        }

        // Si el login es exitoso, devolver los datos del jugador (o un token si lo prefieres)
        return response()->json([
            'message' => 'Login exitoso',
            'jugador' => $jugador,
            'status' => 200
        ], 200);
    }
}
