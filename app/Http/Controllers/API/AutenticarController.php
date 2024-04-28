<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AutenticarController extends Controller
{
    public function register(Request $request){
        try {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'User created successfully',
            'user' => $user
        ], 201);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error creating user', 'error' => $e->getMessage()], 500);
    }
    }

    public function login(Request $request){
        
        //Crear Las Apitokens que se relacionaran con el usuario
        //$user = User::with('roles')->where('email', $request->email)->first();
        $user = User::where('email', $request->email)->first();

        //Validar que el usuario exista y que la contraseña sea correcta
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Incorrect Credentials!!'],
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


    public function logout(Request $request){
    // Eliminando token que fue usado para hacer autenticarse
    $request->user()->currentAccessToken()->delete();
    
    return response()->json([
        'res'=>true,
        'msg'=>'Session closed sucesfully!!'
    ],200);    
    }
}
