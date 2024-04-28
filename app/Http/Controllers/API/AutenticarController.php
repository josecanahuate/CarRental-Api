<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AutenticarController extends Controller
{   
    public function register(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
        ]);
    
        try {
            // Crear un nuevo usuario usando el método create
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            // Agregar roles al usuario
            $user->roles()->attach($request->roles);
    
            // Retornar la respuesta con el usuario creado
            return response()->json([
                'status' => true,
                'message' => 'User created successfully',
                'user' => $user
            ], 201);
        } catch (\Exception $e) {
            // Manejar errores
            return response()->json(['message' => 'Error creating user', 'error' => $e->getMessage()], 500);
        }
    }
    

    public function login(Request $request){
        
        // Validar el login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //Crear Las Apitokens que se relacionaran con el usuario
        $user = User::with('roles')->where('email', $request->email)->first();

        //Validar que el usuario exista y que la contraseña sea correcta
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        
        //si todo esta bien se crea el token relacionado al usuario
        $token = $user->createToken($request->email)->plainTextToken;

        return response()->json([
            'res '=> true,
            'token' => $token,
            'usuario' => $user,
            'msg' => 'Autenticación exitosa'
        ],200);
    }

    //Logout
    public function logout(Request $request){
    // Eliminando token que fue usado para hacer autenticarse
    $request->user()->currentAccessToken()->delete();
    
    return response()->json([
        'res'=>true,
        'msg'=>'Session closed sucesfully!!'
    ],200);    
    }
}